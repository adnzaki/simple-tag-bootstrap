## Accordion Component API

- `Accordion::open(bool $flush = false)`
<br>Generate root accordion component. You have to call this function to generate accordion open tag. If you set `$flush` to true, it will add `'accordion-flush'` class to accordion open tag.

- `Accordion::id(string $id)`<br>
Generate custom accordion ID. This method is optional, since we have default ID.

- `Accordion::setAlwaysOpen()`<br>
Run this method will make accordion body always open after it has opened by user.

- `Accordion::slot($slots)` <br>
Pass slots to accordion. Note that `$slots` should be filled with HTML element that written in SimpleTag format, either it is in a string or array format.

- `Accordion::item(string $headerId, string $bodyId, string $btnLabel, string $content = 'This is a text content', bool $show = false)`
<br>
Calling this function will generate accordion header and body automatically. <br>
`$content` may contain string, either it is just a text or HTML. If you prefer put HTML string to `$content`, consider to write them in other file and grab its content to `$content` argument via native PHP function `file_get_contents()`.
<i>Note: For more readable code, you can use named argument on PHP 8.</i>