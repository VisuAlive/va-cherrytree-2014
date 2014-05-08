Encoding.default_external = "utf-8"

# Require any additional compass plugins here.
add_import_path "bower_components/foundation/scss"

# Set this to the root of your project when deployed:
http_path = "/"
css_dir = "css"
sass_dir = "scss"
images_dir = "images"
javascripts_dir = "js"

# You can select your preferred output style here (can be overridden via the command line):
# output_style = :expanded or :nested or :compact or :compressed
output_style = :compressed

# To enable relative paths to assets via compass helper functions. Uncomment:
# relative_assets = true

# To disable debugging comments that display the original location of your selectors. Uncomment:
# line_comments = false


# If you prefer the indented syntax, you might want to regenerate this
# project again passing --syntax sass, or you can uncomment this:
# preferred_syntax = :sass
# and then run:
# sass-convert -R --from scss --to sass sass scss && rm -rf sass && mv scss sass

require 'autoprefixer-rails'
require 'csso'
on_stylesheet_saved do |file|
  css = File.read(file)
  File.open(file, 'w') do |io|
    io << AutoprefixerRails.compile(css, ['last 3 versions', 'ie 8', 'ios 6', 'android 2.3'])
    # io << AutoprefixerRails.process(css, browsers:['last 3 versions', 'ie 8', 'ios 6', 'android 2.3'])
    # io << AutoprefixerRails.process(css)
    # io << Csso.optimize( AutoprefixerRails.process(css, browsers:['last 1 version', 'ie 8', 'ios 6', 'android 2.3']) )
  end
end
