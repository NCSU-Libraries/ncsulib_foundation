(function() {
  var template = Handlebars.template, templates = Handlebars.templates = Handlebars.templates || {};
templates['device'] = template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  var buffer = "", stack1, functionType="function", escapeExpression=this.escapeExpression, helperMissing=helpers.helperMissing, self=this;

function program1(depth0,data) {
  
  var buffer = "", stack1, stack2, options;
  buffer += "\n            <tr class=\"building\">\n              <td>";
  options = {hash:{},data:data};
  buffer += escapeExpression(((stack1 = helpers.library || depth0.library),stack1 ? stack1.call(depth0, ((stack1 = data),stack1 == null || stack1 === false ? stack1 : stack1.key), options) : helperMissing.call(depth0, "library", ((stack1 = data),stack1 == null || stack1 === false ? stack1 : stack1.key), options)))
    + "</td><td></td><td></td>\n            </tr>\n            ";
  stack2 = helpers.each.call(depth0, depth0['lending-periods'], {hash:{},inverse:self.noop,fn:self.program(2, program2, data),data:data});
  if(stack2 || stack2 === 0) { buffer += stack2; }
  buffer += "\n            </tr>\n          ";
  return buffer;
  }
function program2(depth0,data) {
  
  var buffer = "", stack1, stack2, options;
  buffer += "\n            <tr>\n              <td></td>\n              <td class=\"lending\">";
  options = {hash:{},data:data};
  buffer += escapeExpression(((stack1 = helpers.lend || depth0.lend),stack1 ? stack1.call(depth0, ((stack1 = data),stack1 == null || stack1 === false ? stack1 : stack1.key), options) : helperMissing.call(depth0, "lend", ((stack1 = data),stack1 == null || stack1 === false ? stack1 : stack1.key), options)))
    + "</td>"
    + "\n              <td class=\"availability\">\n                ";
  stack2 = helpers.unless.call(depth0, depth0.techlend, {hash:{},inverse:self.noop,fn:self.program(3, program3, data),data:data});
  if(stack2 || stack2 === 0) { buffer += stack2; }
  buffer += "\n                ";
  stack2 = helpers['if'].call(depth0, depth0.techlend, {hash:{},inverse:self.noop,fn:self.program(5, program5, data),data:data});
  if(stack2 || stack2 === 0) { buffer += stack2; }
  buffer += "\n            ";
  return buffer;
  }
function program3(depth0,data) {
  
  var buffer = "", stack1;
  buffer += "\n                  "
    + "\n                  0 of "
    + escapeExpression(((stack1 = depth0.total),typeof stack1 === functionType ? stack1.apply(depth0) : stack1))
    + "</td>\n                ";
  return buffer;
  }

function program5(depth0,data) {
  
  var buffer = "", stack1;
  buffer += "\n                  "
    + "\n                  "
    + escapeExpression(((stack1 = depth0.techlend),typeof stack1 === functionType ? stack1.apply(depth0) : stack1))
    + " of "
    + escapeExpression(((stack1 = depth0.total),typeof stack1 === functionType ? stack1.apply(depth0) : stack1))
    + "</td>\n                ";
  return buffer;
  }

  buffer += "<div class=\"available\">\n        <table>\n          <thead>\n            <tr>\n              <th>Library</th>\n              <th>Lending Period</th>\n              <th>Available for Checkout</th>\n            </tr>\n          </thead>\n          <tbody>\n          ";
  stack1 = helpers.each.call(depth0, depth0.buildings, {hash:{},inverse:self.noop,fn:self.program(1, program1, data),data:data});
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "\n        </table>\n      </div>\n";
  return buffer;
  });
})();