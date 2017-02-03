# CSS-Processor
Processes CSS files, minifying them and adding vender prefixes based on caniuse.com data

# Methods
construct($options)
- minify
  Set whether the processed CSS should be minified.
  Default - true
- output
  Set how the processed CSS should be output, values should be either:
  - dir
    Saves files to directory, keeping names the same. If set to dir, option 'output_dir' should also be populated.
  - download
  	Download a copy of the processed files
  - text
    Display the generated CSS on-screen
- output_dir
  Set relative directory to save the processed CSS
process($browsers)
processes the CSS files, utilisising [browser thing]. Also accepting "bootstrap-3", "bootstrap-4" to use the defaults supported by the platforms.