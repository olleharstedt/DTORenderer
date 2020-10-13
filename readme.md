Small conception of rendering engine.

## Pros

* Uses objects instead of associative arrays to pass data to viewfiles
* Viewfiles are decouple from the objects
* Objects are immutable (private properties)
* Short-hand `render` function can be used in viewfiles to render child objects.
* Using an option array as input to constructor gives the posibility to provide validation, default values, etc

## Cons

* Hackish solution to extract private properties (missing immutability in PHP)
* Not pure data-transfer objects since they have the extraction behaviour attached

Example: See index.php, button.php, buttongroup.php
