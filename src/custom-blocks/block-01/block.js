import icon from '../../icon.js';

var el = wp.element.createElement,
	registerBlockType = wp.blocks.registerBlockType;

registerBlockType('mokilla-blocks/block-01', {
	title: 'Titolo 01',
	description: 'Descrizione',
	icon: icon,
	category: 'mokilla',
	attributes: {
	},

	edit:function (props) {
		return [
			el('div', {
					className: props.className,
				},
				'Ciao'
			)
		];
	},

	save: function (props) {
		return el('div', {
				className: props.className,
			},
			'Ciao'
		);
	},
});
