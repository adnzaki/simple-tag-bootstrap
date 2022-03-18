## Select Component API

- `Select::size(string $size)`<br>
Set `<select>` size. Available sizes are: "lg" and "sm"
- `Select::disable()`<br>
Disable `<select>` component
- `Select::aria(string $text)`<br>
Create custom `aria-label` attribute
- `Select::multiple()`<br>
Add `multiple` attribute into `<select>`
- `Select::setMultipleSize(int $size)`<br>
Create custom multiple `<select>` size. This method can only be used along with `multiple()` method.
- `Select::title(string $label, bool $isSelected = true)`<br>
Add default selected/title into `<option>` that will be rendered before other options.
- `Select::setOptions(array $options)`<br>
Add options into `<select>` component. `$options` must be in the following format:
```
[ ['label' => 'some text', 'value' => '1'] ]
```
- `Select::render(bool $raw = false)`<br>
Render `<select>` component to the browser. Set `$raw` to `true` will make `<select>` can be used as child component to other component. 