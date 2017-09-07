<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
    </head>
    <style>
    	html, body, div, span, applet, object, iframe,
		h1, h2, h3, h4, h5, h6, p, blockquote, pre,
		a, abbr, acronym, address, big, cite, code,
		del, dfn, em, img, ins, kbd, q, s, samp,
		small, strike, strong, sub, sup, tt, var,
		b, u, i, center,
		dl, dt, dd, ol, ul, li,
		fieldset, form, label, legend,
		table, caption, tbody, tfoot, thead, tr, th, td,
		article, aside, canvas, details, embed,
		figure, figcaption, footer, header, hgroup,
		menu, nav, output, ruby, section, summary,
		time, mark, audio, video {
			margin: 0;
			padding: 0;
			border: 0;
			font-size: 100%;
			vertical-align: baseline;
		}

		html {
			line-height: 1;
		}

		ol, ul {
			list-style: none;
		}

		table {
			border-collapse: collapse;
			border-spacing: 0;
		}

		caption, th, td {
			text-align: left;
			font-weight: normal;
			vertical-align: middle;
		}

		q, blockquote {
			quotes: none;
		}
		q:before, q:after, blockquote:before, blockquote:after {
			content: "";
			content: none;
		}

		a img {
			border: none;
		}

		article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
			display: block;
		}

		body {
			font-family: DejaVu Sans;
			margin: 0;
			padding: 5%;
		}

		.container{
			width:100%;
		}

		.container div{
			min-height: 50px;
			box-sizing: border-box;
			float: left;
		}

		.logo{
			width: 30%;
		}
		.info{
			width: 70%;
			text-align: right;
			font-size: 12px;
			padding-top: 20px;
			box-sizing: border-box;
		}
		.title{
			width: 100%;
			padding: 20px;
			text-align: center;
		}
		.author{
			width: 100%;
			text-align: center;
		}
		.stranka{

		}
		th, td {
		    padding: 10px 15px;
		    text-align: left;
		}
    </style>
    <body>
	    <div class="container">
	    	<div class="logo"><img src="/images/logo.png" width="116px" height="35px"></div>
	    	<div class="info"> Computer Centar · Vozišće 5, 51216, Viškovo · 091/250-6214 · info@computer-centar.com</div>
	    	<div class="title"><h3>NALOG ZA SERVIS {{ $ticket->serial }}</h3></div>
	    	<div class="author">{{ $ticket->created_at->format('d.m.Y') }}</div>
	    	<div class="stranka">
	    		<table>
	    			<tr>
	    				<th>Stranka</th>
	    			</tr>
	    			<tr>	    			
	    				<td>Ime i prezime:</td>
	    				<td>{{ $ticket->client_name }}</td>
	    			</tr>
	    			<tr>
	    				<td>Email:</td>
	    				<td>{{ $ticket->client_email }}</td>
	    			</tr>
	    			<tr>
	    				<td>Telefon:</td>
	    				<td>{{ $ticket->client_phone }}</td>
	    			</tr>
	    			<tr>
	    				<td>Adresa:</td>
	    				<td>{{ $ticket->client_address }}</td>
	    			</tr>
	    		</table>
	    	</div>
	    </div>	
	
	{{ $ticket->client_device }}
	{{ $ticket->device_issue }}
	{{ $ticket->device_note }}


    </body>
</html>