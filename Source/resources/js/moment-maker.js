/**
* Turns any element with class 'time-moment' and a datetime attribute into a fuzzy timestamp
*
* @version 1.0
*
*/

(function() {
	var now = moment();

	$('.time-moment').each(function(i, e) {
		var time = moment($(e).attr('datetime'));

		var len = ($(e).attr('data-len'));

		if (len > 0) {
			if (now.diff(time, 'days') <= len) {
				$(e).html('<span>' + time.from(now) + '</span>');
			}
		} else {
			$(e).html('<span>' + time.from(now) + '</span>');
		}
	});
})();