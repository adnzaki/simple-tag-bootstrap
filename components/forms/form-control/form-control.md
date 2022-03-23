## Form Control Component API

- `FormControl::__construct(string $divClass = '')` <br>
Set class for `<div>` element that wraps `<label>` and `<input>`. The most common use case is adding a margin bottom to separate between input form.
- `FormControl::name(string $name)`<br>
Give `name` attribute to `<input>` element.
- `FormControl::textarea(int $rows = 3)`<br>
Create `<textarea>` element instead of `<input>`.
- `FormControl::type(string $type)`<br>
Give `type` attribute to `<input>` element. 
- `FormControl::label(string $label, string $class = '')`<br>
Create a label for input form. Passing the second argument will overwrite default `<label>` class.
- `FormControl::placeholder(string $placeholder)`<br>
Set a placeholder.
- `FormControl::size(string $size)`<br>
Change input size to large ("lg") or small ("sm").
- `FormControl::disable()`<br>
Disable `<input>` element.
- `FormControl::readonly()`<br>
Set `<input>` element to readonly.
- `FormControl::value(mixed $value)`<br>
Set a value for `<input>` element.
- `FormControl::setClass(string $class)`<br>
Overwrite default "form-control" class
- `FormControl::multiple()`
Add `multiple` attribute for `file` type input.
- `FormControl::title(string $title)`<br>
Give a title for `<input>` element. The most common use case is when working with `color` type input.
- `FormControl::wrap(string|array $attrs)`<br>
Wrap `<input>` element within a `<div>`
- `FormControl::list(string $listName, array $data)`<br>
Create a `<datalist>` for `<input>` element.
- `FormControl::render(bool $raw = false)`
Render all options to the browser. 
Set `$raw` to true to make this component available as a child component from an element.