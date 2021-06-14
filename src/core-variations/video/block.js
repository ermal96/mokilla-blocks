import icon from '../../icon.js';

// vedi https://wordpress.org/gutenberg/handbook/designers-developers/developers/filters/block-filters/

function changeVideoSettings(settings, name) {
	if (name !== 'core-embed/youtube') {
		return settings;
	}
	settings.category = 'crispybacon';
	settings.icon = icon;
	settings.attributes.protetto = {
		type: 'bool',
		default: false
	};
	return settings;
}

var el = wp.element.createElement;
var modifyVideoEdit = wp.compose.createHigherOrderComponent(function (BlockEdit) {
	return function (props) {
		if (props.name !== 'core-embed/youtube') {
			return el(BlockEdit, props);
		}

		return [
			el(
				wp.editor.InspectorControls,
				{ key: 'inspector' },
				el(
					wp.components.PanelBody, {
						title: 'Informazioni Aggiuntive',
						initialOpen: true
					},
					el(
						wp.components.ToggleControl, {
							label: 'Protetto',
							checked: props.attributes.protetto,
							onChange: function (state) {
								console.log(props.attributes.protetto);
								props.setAttributes({ protetto: !props.attributes.protetto });
							}
						}
					),
				),
			),
			el(
				BlockEdit,
				props
			)

		];
	}
}, 'withInspectorControls');






/*wp.hooks.addFilter(
	'blocks.registerBlockType',
	'cbwpt/crispybacon-blocks',
	changeVideoSettings
);

wp.hooks.addFilter(
	'editor.BlockEdit',
	'cbwpt/crispybacon-blocks',
	modifyVideoEdit
);*/
