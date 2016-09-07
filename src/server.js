var http = require("http");
var fs = require("fs");

var server = http.createServer(function(request, response){
	response.writeHead(
		200,{
			"content-type": "text/html"
		}
	);

	response.end("<h1>Hello world in Node.JS</h1>");
});

server.listen(8080);

console.log("[+] server created successfuly");