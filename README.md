[![Latest Stable Version](https://poser.pugx.org/carstenwindler/cwhtmlcompressor/version)](https://packagist.org/packages/carstenwindler/cwhtmlcompressor)
[![Build Status](https://travis-ci.org/carstenwindler/cwhtmlcompressor.svg?branch=master)](https://travis-ci.org/carstenwindler/cwhtmlcompressor)

# cwhtmlcompressor

Very simple Typo3 extension for the case that your provider does not offer gzip compression.

Will compress the html page content using gzip, if HTTP_ACCEPT_ENCODING is set accordingly. Otherwise it will do nothing. That's it already.

This is not to be mistaken with the JS and CSS compression Typo3 offers out of the box.

## Installation

Just activate the extension in the Extension Manager. No further options available.