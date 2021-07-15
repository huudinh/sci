(function() {
	tinymce.PluginManager.add( 'symple_shortcodes_mce_button', function( editor, url ) {
		editor.addButton( 'symple_shortcodes_mce_button', {
			title: 'Shortcodes',
			type: 'menubutton',
			icon: 'icon symple-shortcodes-icon',
			menu: [

				/** Layout **/
				{
					text: 'Checking',
					menu: [
	
						{
							text: 'View Screen',
							onclick: function() {
								editor.insertContent('[screen]');
							}
						}, 



					]
				}, // End Layout Section
				{
					text: 'Popup Video',
					menu: [
						{
							text: 'Popup Video',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Popup Video',
									autoScroll: true,
									height: 250,
									width: 550,
									body: [
									{
										type: 'textbox',
										name: 'url',
										label: 'link Youtobe',
										value: '',
									},
									{
										type: 'textbox',
										name: 'img',
										label: 'Link Ảnh',
										value: '',
									},
									{
										type: 'textbox',
										name: 'title',
										label: 'Tiêu đề',
										value: '',
									},
									
									],
									onsubmit: function( e ) {
										editor.insertContent('[youtube url="' +  e.data.url + '" img="' +  e.data.img + '" title="' +  e.data.title + '"]');
									}
								});
							}
						}, // End Popup Vido

					]
				}, // End Layout Section



			]
		});
	});
})();