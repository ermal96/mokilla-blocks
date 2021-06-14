if (MokillaBlocksBlocksAjax.whitelist.length > 0) {
    var mokillaBlocksAllowedBlocks = JSON.parse(MokillaBlocksBlocksAjax.whitelist);
    function mokillaBlocksWhitelistBlocks(settings, name) {
    	if (mokillaBlocksAllowedBlocks.length !== 0) {
    		if (mokillaBlocksAllowedBlocks.indexOf(name) === -1 && name.indexOf('mokilla-blocks') !== 0) {
    			if (typeof settings.supports === 'undefined') {
    				settings.supports = {};
    			}
    			settings.supports.inserter = false;
    		}
    	}
    
    	return settings;
    }
    
    wp.hooks.addFilter(
    	'blocks.registerBlockType',
    	'mokilla-blocks',
    	mokillaBlocksWhitelistBlocks
    );
}