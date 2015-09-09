/**
 * ownCloud - User Set Password
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2014 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

function showSetPassword() {
	$.colorbox({
		opacity:0.4,
		transition:"elastic",
		speed:100,
		width:"70%",
		height:"70%",
		href: OC.generateUrl('apps/user_set_password/'),
		onComplete : function() {
			if (!SVGSupport()) {
				replaceSVG();
			}
		},
		onClosed : function() {
			$.ajax({
				url: OC.generateUrl('apps/user_set_password/api/1.0/disable'),
				data: ""
			});
		}
	});
}

$('#showSetPassword').live('click', function () {
	showSetPassword();
});

$('.closeSetPassword').live('click', function () {
	$.colorbox.close();
});
