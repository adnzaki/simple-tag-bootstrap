## Accordion Component API

- `accordion(params)`
<br>
Parameters: <br>
`string $headerId` <br>
`string $bodyId` <br>
`string $btnLabel` <br>
`string $content = 'This is a text content'` <br>
`bool $show = false` <br>
`$slots = ''` <br>
`string $accordionId = 'my-accordion'` <br>
This is the most recommended way to generate accordion component, because it wraps `accordion_header()` and `accordion_body()` together. This function allows you to write the same argument once, while if you call `accordion_header()` and `accordion_body()` separately, you might have to create a variable first to define those same arguments. Check out `accordion_body()` documentation below to see how to pass value into `$content` and `$slots` arguments.

- `accordion_open(string $id = 'my-accordion')`
<br>Generates root accordion component. You have to call this function to generate accordion open tag.

- `accordion_header(string $headerId, string $bodyId, string $btnLabel)` <br>
Generates accordion header.

- `accordion_body(string $bodyId, string $headerId, string $accordionId, string $content, $slots = '', bool $show = false)`<br>
Generates accordion body/content. `$content` may contains string, either it is just a text or HTML. If you prefer put HTML string to `$content`, consider to write them in other file and grab its content to `$content` argument via native PHP function `file_get_contents()`. If `$slots` is empty an array or string, then default `<p>` element will be used. Note that `$slots` should be filled with HTML element that written in SimpleTag format, either it is in a string or array format.