(function() {
  var template = Handlebars.template, templates = Handlebars.templates = Handlebars.templates || {};
templates['device'] = template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  var buffer = "", stack1, functionType="function", escapeExpression=this.escapeExpression, helperMissing=helpers.helperMissing, self=this;

function program1(depth0,data) {

  var buffer = "", stack1, stack2, options;
  buffer += "\n  <div class=\"row\">\n    <div class=\"library\">";
  options = {hash:{},data:data};
  buffer += escapeExpression(((stack1 = helpers.library || depth0.library),stack1 ? stack1.call(depth0, ((stack1 = data),stack1 == null || stack1 === false ? stack1 : stack1.key), options) : helperMissing.call(depth0, "library", ((stack1 = data),stack1 == null || stack1 === false ? stack1 : stack1.key), options)))
    + "</div>\n      ";
  stack2 = helpers.each.call(depth0, depth0['lending-periods'], {hash:{},inverse:self.noop,fn:self.program(2, program2, data),data:data});
  if(stack2 || stack2 === 0) { buffer += stack2; }
  buffer += "\n    </div><!-- end .row -->\n";
  return buffer;
  }
function program2(depth0,data) {

  var buffer = "", stack1, stack2, options;
  buffer += "\n        <div class=\"lending-info\">\n          <div class=\"lending-period\">\n            ";
  options = {hash:{},data:data};
  buffer += escapeExpression(((stack1 = helpers.lend || depth0.lend),stack1 ? stack1.call(depth0, ((stack1 = data),stack1 == null || stack1 === false ? stack1 : stack1.key), options) : helperMissing.call(depth0, "lend", ((stack1 = data),stack1 == null || stack1 === false ? stack1 : stack1.key), options)))
    + "\n          </div>\n          ";
  stack2 = helpers.unless.call(depth0, depth0.techlend, {hash:{},inverse:self.noop,fn:self.program(3, program3, data),data:data});
  if(stack2 || stack2 === 0) { buffer += stack2; }
  buffer += "\n          ";
  stack2 = helpers['if'].call(depth0, depth0.techlend, {hash:{},inverse:self.noop,fn:self.program(5, program5, data),data:data});
  if(stack2 || stack2 === 0) { buffer += stack2; }
  buffer += "\n        </div><!-- end .lending-info -->\n      ";
  return buffer;
  }
function program3(depth0,data) {

  var buffer = "", stack1;
  buffer += "\n            <div class=\"number-available\">\n              0 of "
    + escapeExpression(((stack1 = depth0.total),typeof stack1 === functionType ? stack1.apply(depth0) : stack1))
    + "\n            </div>\n          ";
  return buffer;
  }

function program5(depth0,data) {

  var buffer = "", stack1;
  buffer += "\n            <div class=\"number-available\">\n              "
    + escapeExpression(((stack1 = depth0.techlend),typeof stack1 === functionType ? stack1.apply(depth0) : stack1))
    + " of "
    + escapeExpression(((stack1 = depth0.total),typeof stack1 === functionType ? stack1.apply(depth0) : stack1))
    + "\n            </div>\n          ";
  return buffer;
  }

  buffer += "<div class=\"top-row\">\n  <span class=\"one\">Library</span>\n  <span class=\"two\">Lending Period</span>\n  <span class=\"three\">Available for Checkout</span>\n</div>\n";
  stack1 = helpers.each.call(depth0, depth0.buildings, {hash:{},inverse:self.noop,fn:self.program(1, program1, data),data:data});
  if(stack1 || stack1 === 0) { buffer += stack1; }
  return buffer;
  });
})();