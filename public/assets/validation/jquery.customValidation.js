
//Custom validation Rules
// Alpha Space or Number or underscore allowed.
jQuery.validator.addMethod("alphaspaceUnderNum", function(value, element) {
   return this.optional(element) || value == value.match(/^[-a-zA-Z0-9_ ]+$/);
}, "Only letters, Numbers & Space/underscore Allowed.");

//only alpha, Minus and Plus allowed without space
jQuery.validator.addMethod("alphaMinusPlus", function(value, element) {
   return this.optional(element) || value == value.match(/^[a-zA-Z-+]+$/);
}, "Only letters Allowed without space.");

//alphaspace allowed
jQuery.validator.addMethod("alphaspace", function(value, element) {
   return this.optional(element) || value == value.match(/^[a-zA-Z ]+$/);
}, "Only letters & Space Allowed.");

// Alpha character or hyphen or underscore allowed without space.
jQuery.validator.addMethod("alphaspaceUnderHyphen", function(value, element) {
   return this.optional(element) || value == value.match(/^[-a-zA-Z_ ]+$/);
}, "Only letters, underscore & hyphen Allowed.");

// Alpha Number Or Underscore Allowed
jQuery.validator.addMethod("alphaNum", function(value, element) {
   return this.optional(element) || value == value.match(/^[A-Za-z0-9_]{3,20}$/);
}, "Space not allowed! Only letters, Numbers & underscore Allowed.");

// Float Number or after(.) Max Three digit Allowed
jQuery.validator.addMethod("floatNumber", function(value, element) {
   return this.optional(element) || value == value.match(/^-?(?:\d+|\d{1,3}(?:,\d{3})+)?(?:\.\d{1,2})?$/);
}, "Value must be float or int after (.) only contain two decimal place.");

// One Digit Accept Before dot Float Number or after(.) Max Three digit Allowed
jQuery.validator.addMethod("onlyOneFloatNum", function(value, element) {
   return this.optional(element) || value == value.match(/^-?(?:\d{1}|\d{1,3}(?:,\d{3})+)?(?:\.\d{1,2})?$/);
}, "Only one decimal digit accept before dot and two decimal place after dot.");

jQuery.validator.addMethod("greaterThanZero", function(value, element) {
    return this.optional(element) || (parseFloat(value) > 0);
}, "Amount must be greater than zero");

// Alpha character or Number or underscore or Dot allowed without space.
jQuery.validator.addMethod("alphaUnderNumDot", function(value, element) {
   return this.optional(element) || value == value.match(/^[a-zA-Z0-9_.]+$/);
}, "Only letters, Numbers & dot/underscore Allowed.");

// Alpha space, Number, underscore and hypan allowed
jQuery.validator.addMethod("alphaspaceUnderNumHypan", function(value, element) {
   return this.optional(element) || value == value.match(/^[-a-zA-Z0-9_ ]+$/);
}, "Only letters, Numbers & Hypan/underscore Allowed.");

//  Number, hyphen, plus Space Allowed
jQuery.validator.addMethod("numberHypenPlusspace", function(value, element) {
   return this.optional(element) || value == value.match(/^[-0-9+ ]+$/);
}, "Only number, hyphen & space/plus Allowed.");


//  Number, hyphen Allowed
jQuery.validator.addMethod("numberHypen", function(value, element) {
   return this.optional(element) || value == value.match(/^[-0-9]+$/);
}, "Only number & hyphen Allowed.");

//  only number Allowed without space
jQuery.validator.addMethod("onlyNumber", function(value, element) {
   return this.optional(element) || value == value.match(/^[0-9]+$/);
}, "Only number Allowed.");




//Custom validation Rules
//alphaspace allowed
jQuery.validator.addMethod("alphaspace", function(value, element) {
   return this.optional(element) || value == value.match(/^[a-zA-Z ]+$/);
}, "Only letters & Space Allowed.");

//alphaspace with dot allowed
jQuery.validator.addMethod("alphaspaceDot", function(value, element) {
   return this.optional(element) || value == value.match(/^[a-zA-Z. ]+$/);
}, "Only letters, space & dot allowed.");

// Alphaspace or Number or underscore or Dot allowed without space.
jQuery.validator.addMethod("alphaspaceUnderNumDot", function(value, element) {
   return this.optional(element) || value == value.match(/^[a-zA-Z0-9_. ]+$/);
}, "Only letters, Numbers & dot/underscore Allowed.");

