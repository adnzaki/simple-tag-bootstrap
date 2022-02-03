## Icons Component API

- `Icons::useSvg(string $baseUrl)`<br>
Set icon to use SVG format where `$baseUrl` is directory of `bootstrap-icons.svg` file.
- `Icons::setDefaultSize(int $width, int $height)`<br>
Overwrite default icon size for SVG format.
- `Icons::render(string $iconName, int $width = 0, int $height = 0)`<br>
Render SVG icons.
- `Icons::font(string $iconName, string $size = '', string $color = '')`<br>
Render Webfont icons.