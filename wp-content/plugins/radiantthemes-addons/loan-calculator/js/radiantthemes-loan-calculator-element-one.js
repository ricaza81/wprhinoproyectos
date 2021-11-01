function j() {
    var q = /^(([1-9]\d{0,2}(,\d{3})*)|(([1-9]\d*)?\d))(\.\d\d)?$/;
    var r = /^\d+$/;
    var s = /^(100|0|(^0(\.([0-9]{1,})?)|([1-9]{1})?[0-9](\.([0-9]{1,})?)?))$/;
    var n = jQuery(".calculator.active").find("input.dollar").val();
    var o = jQuery(".calculator.active").find("input.loan").val();
    var p = jQuery(".calculator.active").find("input.percent").val();
    if (!q.test(n)) {
        jQuery(".calculator.active").find("input.dollar").val(10000);
    }
    if (!r.test(o)) {
        jQuery(".calculator.active").find("input.loan").val(10);
    }
    if (!s.test(p)) {
        jQuery(".calculator.active").find("input.percent").val(8);
    }
    if (n < 10000) {
    	jQuery(".calculator.active").find("input.dollar").val(10000);
    }
    if (n > 250000) {
    	jQuery(".calculator.active").find("input.dollar").val(250000);
    }
}

function k() {
    var q = /^(([1-9]\d{0,2}(,\d{3})*)|(([1-9]\d*)?\d))(\.\d\d)?$/;
    var r = /^\d+$/;
    var s = /^(100|0|(^0(\.([0-9]{1,})?)|([1-9]{1})?[0-9](\.([0-9]{1,})?)?))$/;
    var n = jQuery(".calculator.active").find("input.dollar").val();
    var o = jQuery(".calculator.active").find("input.loan").val();
    var p = jQuery(".calculator.active").find("input.percent").val();
    if (!q.test(n)) {
        jQuery(".calculator.active").find("input.dollar").val(5000);
    }
    if (!r.test(o)) {
        jQuery(".calculator.active").find("input.loan").val(12);
    }
    if (!s.test(p)) {
        jQuery(".calculator.active").find("input.percent").val(9.5);
    }
    if (n < 5000) {
    	jQuery(".calculator.active").find("input.dollar").val(5000);
    }
    if (n > 250000) {
    	jQuery(".calculator.active").find("input.dollar").val(250000);
    }
    if (o < 12) {
    	jQuery(".calculator.active").find("input.loan").val(12);
    }
    if (o > 84) {
    	jQuery(".calculator.active").find("input.loan").val(84);
    }
}

// EMI CALCULATOR
var interest_rate_emi = jQuery("#sliderVLloanIr_v").bootstrapSlider({
	tooltip: 'always'
});
var investment_term_emi = jQuery("#sliderVLloanTerm_v").bootstrapSlider({
	tooltip: 'always'
});
var start_balance_emi = jQuery("#sliderVLloanAmt_v").bootstrapSlider({
	tooltip: 'always'
});

var loanAmountEmi   = jQuery("#dollarValueVLloanAmt_v").val();
var interestRateEmi = jQuery("#dollarValueVLloanIr_v").val();
var loanTermEmi     = jQuery("#dollarValueVLloanTerm_v").val();

var p = function () {
	var q = (interestRateEmi / 100) / 12;
	return q;
};

if ( interestRateEmi == 0) {
    $monthlyPayments = loanAmountEmi / loanTermEmi;
} else {
    $monthlyPayments = (loanAmountEmi * p() * Math.pow((1 + p()), loanTermEmi)) / (Math.pow((1 + p()), loanTermEmi) - 1);
}

var n = "$" + $monthlyPayments.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
jQuery("#vehicleTotal").text(n);

jQuery("#calcCard_1 input").change(function(){
	k();

    var loanAmountEmi   = jQuery("#dollarValueVLloanAmt_v").val();
	var interestRateEmi = jQuery("#dollarValueVLloanIr_v").val();
	var loanTermEmi     = jQuery("#dollarValueVLloanTerm_v").val();

	var p = function () {
		var q = (interestRateEmi / 100) / 12;
		return q;
	};

	if ( interestRateEmi == 0) {
	    $monthlyPayments = loanAmountEmi / loanTermEmi;
	} else {
	    $monthlyPayments = (loanAmountEmi * p() * Math.pow((1 + p()), loanTermEmi)) / (Math.pow((1 + p()), loanTermEmi) - 1);
	}

	var n = "$" + $monthlyPayments.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
	jQuery("#vehicleTotal").text(n);
});

jQuery("#dollarValueVLloanAmt_v").on('keydown focusout', function() {
   start_balance_emi.bootstrapSlider('setValue', jQuery(this).val());
});

jQuery("#dollarValueVLloanIr_v").on('keydown focusout', function() {
   interest_rate_emi.bootstrapSlider('setValue', jQuery(this).val());
});

jQuery("#dollarValueVLloanTerm_v").on('keydown focusout', function() {
   investment_term_emi.bootstrapSlider('setValue', jQuery(this).val());
});

interest_rate_emi.on("change", function (n) {
    jQuery("#dollarValueVLloanIr_v").val(jQuery(this).val());
});

investment_term_emi.on("change", function (n) {
    jQuery("#dollarValueVLloanTerm_v").val(jQuery(this).val());
});

start_balance_emi.on("change", function (n) {
    jQuery("#dollarValueVLloanAmt_v").val(jQuery(this).val());
});
// EMI CALCULATOR

// DEPOSIT CALCULATOR
var interestRate = jQuery("#sliderVLloanIr_b").bootstrapSlider({
	tooltip: 'always'
});
var investmentTerm = jQuery("#sliderVLloanTerm_b").bootstrapSlider({
	tooltip: 'always'
});
var startBalance = jQuery("#sliderVLloanAmt_b").bootstrapSlider({
	tooltip: 'always'
});

var startingbalance = jQuery("#dollarValueVLloanAmt_b").val();
var interestrate = jQuery("#dollarValueVLloanIr_b").val() / 100;
var totalyears = jQuery("#dollarValueVLloanTerm_b").val();

var compoundsperyear = 12;
var n = "$" + (startingbalance * Math.pow((1 + interestrate / compoundsperyear), (compoundsperyear * totalyears))).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
jQuery("#boatTotal").text(n);

jQuery("#calcCard_2 input").change(function(){
	j();

	var startingbalance = jQuery("#dollarValueVLloanAmt_b").val();
	var interestrate    = jQuery("#dollarValueVLloanIr_b").val() / 100;
	var totalyears      = jQuery("#dollarValueVLloanTerm_b").val();

	var compoundsperyear = 12;
	var n = "$" + (startingbalance * Math.pow((1 + interestrate / compoundsperyear), (compoundsperyear * totalyears))).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
	jQuery("#boatTotal").text(n);
});

jQuery("#dollarValueVLloanAmt_b").on('keydown focusout', function() {
   startBalance.bootstrapSlider('setValue', jQuery(this).val());
});

jQuery("#dollarValueVLloanIr_b").on('keydown focusout', function() {
   interestRate.bootstrapSlider('setValue', jQuery(this).val());
});

jQuery("#dollarValueVLloanTerm_b").on('keydown focusout', function() {
   investmentTerm.bootstrapSlider('setValue', jQuery(this).val());
});

interestRate.on("change", function (n) {
    jQuery("#dollarValueVLloanIr_b").val(jQuery(this).val());
});

investmentTerm.on("change", function (n) {
    jQuery("#dollarValueVLloanTerm_b").val(jQuery(this).val());
});

startBalance.on("change", function (n) {
    jQuery("#dollarValueVLloanAmt_b").val(jQuery(this).val());
});
// DEPOSIT CALCULATOR