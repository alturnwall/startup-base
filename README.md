# Startup-Base: a standalone or parent theme
My simple WordPress Starter theme for websites, good for a startup CMS or personal website.

Freely re-usable, at your own risk :)

This is my personal mess of code that has been hacked, copy/pasted and re-written for dozens of projects over the years. It's largely based on the [Underscores Starter Theme](https://underscores.me/), which I forked many moons ago to arrive at this. I'm not sure anyone should really use this except for me, but it might give you some interesting ideas for your own theming. 

This is mostly for my own use: I'm not trying to grow this into something that's intended to be widely adopted. That said, I may fix small bugs and will accept PRs for folks that might want to help. 

## What's the deal?

### 1. SASS and child theme imports and overrides.

I have been pretty opinionated about design and CSS for a long time. In the dark ages of the internet, before many CSS frameworks were around, I started with my own way of handling CSS and never really had a need to adopt the other frameworks. Once SASS came out, I refactored my stuff to work with SASS.

### 2. Simple WordPress, optimized for a clean website with optional content-heavy blog.

There's a bunch of template stuff to allow for sane creation of pagination, archive pages, tag pages, etc. If you want a blog that's a section of your website [like mine](https://www.turnwall.com/articles/), this might be helpful for you.


## Installation for WP Admins

Download this here folder and put it in your website's themes folder. Turn on the theme. It will work.

## Installation for Developers

Clone into WP theme folder

Setup grunt: https://gruntjs.com/getting-started
`npm install grunt --save-dev`

install grunt-contrib-sass
`npm install grunt-contrib-sass --save-dev`

install grunt-contrib-watch
`npm install grunt-contrib-watch --save-dev`
