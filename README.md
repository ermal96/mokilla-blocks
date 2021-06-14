This project was bootstrapped with [Create Guten Block](https://github.com/ahmadawais/create-guten-block).

In this package you will find a slightly modified version, with support for OOP PHP, 
with an administration page to manage the core blocks (so with an already integrated whitelist!), 
and a method ready to rename the category for the custom blocks we are creating.

## 👉 OOP
- The `src/init.php` file has been converted to OOP, just for an easy functions management.

## 👉 Administration panel
- In the WP admin menu you will find Custom Blocks Admin, where you can whitelist
the core blocks to be included in the project. 
- Some blocks have a coloured name, just hover on them to know why.
- To complete the whitelisting, go to `src/init.php`, find `allowed_block_types` method and fill in
the name of the blocks you'll be creating for each post type. THIS IS A MANDATORY ACTION!

## 👉 Custom category
- I recommend to put our custom blocks in a custom category. Go to `src/init.php`, find `add_category` method
and provide ONLY the title, so that you don't have to modify the category slug in each block of this library.
- If you have to create another category, just add the new category in the array of the method above.
- If you are not using the custom category, just clean the code.

## 👉 Commented features
In `src/init.php` there are some commented hooks:
- Commented the callback `template_to_posts`, uncomment it if you need to pre-load some blocks into a new post.
- Commented the callback `register_callbacks`, uncomment it if you need to register a callback for a dynamic block.
- Commented the callback `register_meta`, uncomment it if you need to register a meta for a specific block.

Scripts to run
--------------------------------------
I've added to the create-guten-block setting a feature to add some frontend javascript for each block: 
just add in the block folder another folder named "public" and put your frontend scripts inside.
They will be bundled in another file and loaded into WP in the right moment. 
Don't use fancy javascript inside that files, only jQuery or plain ES5 javascript.


## 👉  `npm run dev`
- Starts the developer mode, where all watches are active to update the bundle when the single scripts change

## 👉  `npm run build`
- To build the bundles before deploy

## 👉  `npm run eject`
- Use to eject your plugin out of `create-guten-block`.
- Provides all the configurations so you can customize the project as you want.
- It's a one-way street, `eject` and you have to maintain everything yourself.
- You don't normally have to `eject` a project because by ejecting you lose the connection with `create-guten-block` and from there onwards you have to update and maintain all the dependencies on your own.

