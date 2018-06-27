
var searchBar = document.getElementById('input');
var tag = '';

searchBar.onkeydown = function () {
	if(document.getElementsByClassName('newTag')) {
		var i = 0;
		while(document.getElementsByClassName('newTag').length > i) {
			document.getElementsByClassName('newTag')[i].remove();
			i++;
		}
	}
}

searchBar.onkeyup = function() {

	tag = this.value.split(' ');
	tag = tag[tag.length-1];

	function setTag(tags)
	{
		var searchBar = document.getElementById('inputDiv');

		// var tags = data.split('-');
		var i = 0;
		if(document.getElementsByClassName('newTag').length <= 5 && !document.getElementById('input').value == '')
		{
			while(i <= tags.length-1 && tags[i].valeur != undefined && tags[i].valeur != '')
			{
				if(!document.getElementById('id-'+tags[i].valeur))
				{
					var newTag = document.createElement('div');
					newTag.setAttribute('class', 'newTag');
					newTag.setAttribute('id', 'id-'+tags[i].valeur);
					newTag.innerHTML = tags[i].valeur;
					if(document.getElementsByClassName(newTag).length == 0)
						searchBar.append(newTag);
					else
						searchBar.append(newTag);
					callback(newTag);
				}
				i++;
			}
		}
		while(document.getElementsByClassName('newTag').length > 4) {
			document.getElementsByClassName('newTag')[document.getElementsByClassName('newTag').length-1].remove();
		}
	}
	function ajax(tag)
	{
		$.ajax({
			type: "POST",
			url: "model/redirect_tag.php",
			data : {"tag" : tag},
			dataType: "json",
			success:function(data) {
				setTag(data);
			},
		});
	}
	ajax(tag);

	function callback(newTag) {
			$(newTag).on('click', function () {
				var tagAdd = this.innerHTML;

				var split = document.getElementById('input').value.split(' ');
				split[split.length-1] ='';
				document.getElementById('input').value = null;

				var i = 0;
				while(i < split.length)
				{
					document.getElementById('input').value += split[i]+' ';
					i++;
				}
				document.getElementById('input').value += tagAdd + ' ';
				while(document.getElementsByClassName('newTag').length > 0) {
					document.getElementsByClassName('newTag')[0].remove();
				}
			})
	}
}
