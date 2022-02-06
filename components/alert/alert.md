## Alert Component API

- `Alert::text(string $text, string $tag = '')` <br>
Add content to alert. `$tag` argument allows you to add outer tag into the main content. Note that you cannot pass multiple outer tag like in SimpleTag here. If you really need to do that, use SimpleTag instead.
- `Alert::link(string $link, string $label)` <br>
Add a link to alert content. Since this method similars to `text()`, you can use method chaining
to add link as many as you want.
- `Alert::dismiss(string $color)`
Set alert to be dismissible. In this case, you have to set alert color in `$color` argument.
- `Alert::render(string $color = '')`
Render alert to the browser. Leave `$color` blank if you are using dismissible alert.