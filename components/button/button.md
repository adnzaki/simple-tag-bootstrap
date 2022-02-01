## Button Component API

- `Button::outline()` <br>
Set button style to outline buttons that remove all background and colors
- `Button::disable()` <br>
Set button state to disabled.
- `Button::size(string $size)` <br>
Set button size into other different sizes available: Large (`lg`) and Small (`sm`)
- `Button::tag(string $tagName)` <br>
Set button tag into other available tags: `<a>`, `<input>`
- `Button::noWrap()` <br>
Disable text wrapping
- `Button::render(string $color, string $label, string $type = 'button')` <br>
The button renderer. This method grabs all button options passed by the user and convert them into Bootstrap button standard.
