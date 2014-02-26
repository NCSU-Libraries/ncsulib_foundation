#Migrate from 960gs to Foundation

In this document I will describe how to move from [960gs](http://960.gs/) to Zurb's [Foundation](http://foundation.zurb.com/).  This article will cover the basics of the grid and some options with Sass.

##The grid

To get started, you'll need to understand the basic concepts of rows and columns in Foundation.  960gs' convention was to use one mega container, and rely on each combination of divs to make a row.  Like so

	<div class="container_12">
		<div class="grid_6"></div>
		<div class="grid_6"></div>
		<div class="grid_6"></div>
		<div class="grid_6"></div>
	</div>

You might have a `<div class="clear"></div>` thrown in between grid divs that add up to 12, but that's optional.  This layout would in effect produce two rows with two columns that equally divided the available width.  If you add `alpha` and `omega` classes, it will respectively strip the extra `margin-left` and `margin-right`.  Also, by default, 960gs doesn't provide any vertical spacing (that is, `margin-bottom`).

In [Foundation's predefined HTML classes](http://foundation.zurb.com/docs/components/grid.html), this same layout would be accomplished by the following snippet:

	<div class="row">
		<div class="medium-6 columns"></div>
		<div class="medium-6 columns"></div>
	</div>
	<div class="row">
		<div class="medium-6 columns"></div>
		<div class="medium-6 columns"></div>
	</div>

For what it's worth, Foundation's grid is similar to [Twitter Bootstrap's](http://getbootstrap.com/2.3.2/scaffolding.html#gridSystem) rows and spans, except Foundation gives you the power to define column widths at multiple breakpoints.

You'll notice the notation `medium-6`.  That means at the medium breakpoint (we define that as `768px`), you'll see 6 columns worth of width, or 50%.  Another class maybe added to a `div` to indicate how many columns worth of width the `div` should take up at other breakpoints, including `small` and `large`.  Here's how that would look:

	<div class="row">
		<div class="medium-6 small-6 columns"></div>
		<div class="medium-6 small-6 columns"></div>
	</div>
	<div class="row">
		<div class="medium-6 small-3 columns"></div>
		<div class="medium-6 small-9 columns"></div>
	</div>

> Foundation is **mobile-first**. Code for small screens first, and larger devices will 
> inherit those styles. Customize for larger screens as necessary. [source](http://foundation.zurb.com/docs/components/grid.html)


By default, Foundation is designed in a [mobile first concept](http://www.lukew.com/resources/mobile_first.asp).  What this means for grids is that the `small` class can be used alone to define the width of a column at the small breakpoint and all breakpoints above if a `medium` or `large` class is not present.  On the flip side, if you just use a `medium` class, then the default small breakpoint layout will transform the `div`s into stacked single-column rows (equivalent to `small-12`). 

We have defined extra breakpoints so that we can be more specific and to help with the actual things that break in our design at different viewports.  See below. 

###960 grid "equivalents"

With all that in mind, the basics of changing your markup are thus: First, the `div` with the  `container` class can be deleted.  Around your `grid_#` divs that make up "rows", you'll need to create a `div` with the class `row`.  The individual divs containing `grid` classes can be changed to `medium-#`.  

This will give you something that looks an awful lot like your old 960gs layout for viewports above 767 pixels and below that width you'll just have full-width stacks of rows, meaning that each column div will change to 100% width.

If you want to optimize for responsive, then you can add an additional class for the other breakpoints.

###Read more

That's the bare bones basics of the grid layout.  See the [docs](http://foundation.zurb.com/docs/) to learn about nesting, centering, offsetting and more.

##Our defined breakpoints

In addition to `medium` and `small`, there are also `large`, `xlarge` and `xxlarge`.  Here's what that translates to:

Breakpoint 		| Viewport width
------------ 	| ------------- 
small 			| < 47.937em (767px) 
medium 			| 48em (768px) < 64em (1024px)
large 			| 64.063em (1025px) < 90em (1440px)
xlarge 			| 90.063em (1441px) > 120em (1920px)
xxlarge			| > 120.063em (1921px)

All of these breakpoints can be used as classes in the same fashion that `small` and `medium` are used above. 

##Sass options

Foundation is built to work with Compass and Sass.  If Sass is something your comfortable with, it can make development easier, [read more](http://foundation.zurb.com/docs/sass.html) about getting started with Sass and Foundation. 

The key pro for using Sass is that, instead of adding Foundation-specific classes to your HTML, you can just extend Foundation attributes based on existing markup. For example, that `div` with the class `news` can be made to mimic a `grid-6 columns` `div`.
	
Here's a full example of how this might look, let's say you have this HTML:

	<div class="main">
		<div class="news"></div>
		<div class="events"></div>
	</div>

To achieve a 50/50 split of `.news` and `.events`, your SCSS that looks like this:

	.main {
		@include grid-row;
		
		.news {
			@include grid-column(6);
		}
		.events {
			@include grid-colmn(6);
		}
	}
	
This is the equivalent of changing the markup to this:

	<div class="row">
		<div class="small-6 columns"></div>
		<div class="small-6 columns"></div>
	</div>

If you wanted to include other breakpoints in your SCSS, you would just use this technique:

	.main {
		@include grid-row;
		
		.news {
			@include grid-column(8);
			@media #{$large-up} {
				grid-column(6)
			}
		}
		.events {
			@include grid-colmn(4);
			@media #{$large-up} {
				grid-column(6)
			}
		}
	}
	
Which is the same as:

	<div class="row">
		<div class="small-8 large-6 columns"></div>
		<div class="small-4 large-6 columns"></div>
	</div>
	
The SCSS technique is nice because it keeps your classes uncluttered in your HTML, and allows you to be more semantic.

There's one more important thing to understand about this method.  If you are compiling your CSS to a separate additional stylesheet, but you want to make use of the Foundation `mixins`, you'll need to import what you need and *prevent duplicating Foundation styles*.  To avoid redundant styles being added to your output CSS you need to specify the `$include-html-classes` variable as `false` too, here's what it looks like:

	@import "foundation/settings";
	$include-html-classes: false;
	@import "foundation";
	
Note that the paths may differ based on your own setup.  This will allow you to use all the mixins, functions and settings in Foundation, without having to duplicate all the CSS.  This is handy if you are already including the Foundation CSS on the page you are working on.  This method could, for example, be used as a place to store all of your extensions. 