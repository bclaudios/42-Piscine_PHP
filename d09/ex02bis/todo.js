function CreateTask(task, id)	{
	if (!task)
		var task = prompt("Wich task would you like to add ?");
	if (!id)
		id = Date.now();
	if (task)	{
		$("#ft_list").prepend("<div class='task' id='" + id +"'>" + task + "</div>");
		RegisterCookie(id, task);
	}
}

$("#ft_list").on("click", "div", function()	{
	RemoveTask($( this ).attr("id"));
});

function RemoveTask(id)	{
	var del = confirm("Do you want to delete this task ?");
	if  (del)	{
		var taskList = document.getElementById("ft_list");
		var child = document.getElementById(id);
		taskList.removeChild(child);
		DeleteCookie(id);
	}
}

function RegisterCookie(id, task)	{
	var cookies = document.cookie ? JSON.parse(document.cookie) : {};
	cookies[id] = task;
	document.cookie = JSON.stringify(cookies);
}

function GetCookies()	{
	return JSON.parse(document.cookie);
}

function DeleteCookie(id)	{
	var cookies = GetCookies();
	delete cookies[id];
	document.cookie = JSON.stringify(cookies);
}
$("#submit").click(function() {
	CreateTask();
});

document.addEventListener('DOMContentLoaded', function() {
	if (document.cookie)	{
		var cookies = GetCookies();
		var keysList = Object.keys(cookies);
		for (i = 0; i < keysList.length; i++)	{
			CreateTask(cookies[keysList[i]], keysList[i]);
		}
	}
}, false);
