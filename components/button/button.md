## Button Component API

- `Button::outline()` <br>
Set button style to outline buttons that remove all background and colors
- `Button::disable()` <br>
Set button state to disabled.
- `Button::size(string $size)` <br>
Set button size into other different sizes available: Large (`lg`) and Small (`sm`)
- `Button::tag(string $tagName)` <br>
Set button tag into other available tags: `<a>`, `<input>`
- `Button::event(array $events = [])` <br>
Pass event handler into buttons. You can pass event handler as many as you want as long as they are in the accepted format. SimpleTag can receive any event handling from standard Javascript until framework event handler like Vue.js
- `Button::noWrap()` <br>
Disable text wrapping
- `Button::slot($slots)` <br>
Pass other element to inner content with SimpleTag format.
- `Button::id(string $id)` <br>
Add custom button ID.
- `Button::render(string $color, string $label, string $type = 'button')` <br>
The button renderer. This method grabs all button options passed by the user and convert them into Bootstrap button standard.
