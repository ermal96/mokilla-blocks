import icon from '../../icon.js';

var el = wp.element.createElement,
  registerBlockType = wp.blocks.registerBlockType;

registerBlockType('mokilla-blocks/block-01', {
  title: 'Block 01',
  description: '',
  icon: icon,
  category: 'mokilla',
  attributes: {},

  edit: (props) => {
    return <span>Hello</span>;
  },

  save: (props) => {
    return <span>Hello</span>;
  },
});
