<?php
class RT_Megamenu_Render extends Walker_Nav_Menu {

	var $columns = 0;
	private $is_parent = false;
	public $childs;

	public function start_lvl( &$output, $depth = 0, $args = array(), $class = 'rt-sub-menu' ) {
		$indent = str_repeat("\t", $depth);
		if ( $depth === 0 ) {
			$output .= "\n$indent<ul class=\"$class\">\n";
		} else {
			$output .= "\n$indent<ul class=\"$class\">\n";
		}

	}

	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "$indent</ul>\n";
	}

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';



		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';


		$output .= $indent . '<li' . $id . $class_names .'>';


		$atts = array();

		if ( $depth === 1 ) {
			$this->columns++;
		}

		$megamenu_icon = get_post_meta( $item->ID, '_rt_megamenu_sicon', true );

		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title = apply_filters('the_title', $item->title, $item->ID);
		$display = get_post_meta( $item->ID, '_rt_megamenu_hide_label', true );
		$parent_is_tab = get_post_meta( $item->menu_item_parent, '_rt_megamenu_hide_label', true );
		$item_output = '';
		if ( $display !== 'true' || ( $depth !== 1 && $parent_is_tab == 'true' ) ) {
			$item_output = '<a '. $attributes . '>';
			if ( !empty( $megamenu_icon ) ) {
				$item_output .= '<i class="'. $megamenu_icon .' rt-mega-menu-icon" ></i>';
			}
			$item_output .=  $title .'</a>';
		}

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {

		if ( !$element )
			return;

		$id_field = $this->db_fields['id'];
		$id       = $element->$id_field;

		$this->has_children = ! empty( $children_elements[ $id ] );
		if ( isset( $args[0] ) && is_array( $args[0] ) ) {
			$args[0]['has_children'] = $this->has_children;
		}

		$cb_args = array_merge( array( &$output, $element, $depth ), $args );
		call_user_func_array(array($this, 'start_el'), $cb_args);
		$this->is_parent = true;
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

			foreach( $children_elements[ $id ] as $child_id => $child ) {
				$this->is_parent = false;

				if ( $depth == 0 && get_post_meta( $id, '_rt_megamenu_enable', true ) == 'true' && get_post_meta( $id, '_rt_megamenu_type', true ) == 'column' && ( get_post_meta( $child->ID, '_rt_megamenu_enable_row', true ) == 'true' || $this->columns === 4 ) ) {
					if ( isset( $newlevel ) && $newlevel ) {
						$cb_args = array_merge( array(&$output, $depth), $args);
						call_user_func_array(array($this, 'end_lvl'), $cb_args);
						unset($newlevel);
					}
				}

				if ( !isset($newlevel) ) {
					$newlevel = true;

					if (!isset($mega_menu_container) && $depth == 0 && ( get_post_meta( $id, '_rt_megamenu_enable' ) || get_post_meta( $id, '_rt_megamenu_type', true ) == 'tab' ) ) {
						$mega_menu_container = apply_filters('rt_mega_menu_container', array(
							'tag'  => 'div',
							'attr' => array( 'class' => 'rt-mega-menu' )
						), array(
							'element'           => $element,
							'children_elements' => $children_elements,
							'max_depth'         => $max_depth,
							'depth'             => $depth,
							'args'              => $args,
						));

						$attr = '';
						foreach ( $mega_menu_container['attr'] as $attr_name => $attr_value ) {
							$attr .= $attr_name . '="' . $attr_value . '"';
						}

						$output .= '<'. $mega_menu_container['tag'] .' '. $attr .'>';
					}

					$classes = array( 'rt-sub-menu' => true );

					if ( $depth == 0 && get_post_meta( $id, '_rt_megamenu_type', true ) == 'tab' ) {
						$classes['rt-mega-menu-tabs'] = true;
					}

					if ( $depth == 0 && get_post_meta( $id, '_rt_megamenu_enable', true ) && get_post_meta( $id, '_rt_megamenu_type', true ) == 'column' ) {
						$classes['rt-mega-menu-row'] = true;
					}

					$classes = apply_filters('rt_mega_menu_start_lvl_classes', $classes, array(
						'element'             => $element,
						'children_elements'   => $children_elements,
						'max_depth'           => $max_depth,
						'depth'               => $depth,
						'args'                => $args,
						'mega_menu_container' => isset($mega_menu_container) ? $mega_menu_container : false
					));
					$classes = array_filter($classes);

					$cb_args = array_merge( array(&$output, $depth), $args, array(
						implode(' ', array_keys($classes))
					));

					$this->enable = rt_megamenu_meta( $id, '_rt_megamenu_enable' );

					call_user_func_array(array($this, 'start_lvl'), $cb_args);
				}

				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}

			unset( $children_elements[ $id ] );
		}

		if ( isset($newlevel) && $newlevel ){

			$cb_args = array_merge( array( &$output, $depth ), $args );
			call_user_func_array(array($this, 'end_lvl'), $cb_args);
		}


		if (isset($mega_menu_container)) {
			$output .= '</'. $mega_menu_container['tag'] .'>';
		}
		$cb_args = array_merge( array( &$output, $element, $depth ), $args );
		call_user_func_array( array( $this, 'end_el' ), $cb_args );
	}

} // Walker_Nav_Menu
