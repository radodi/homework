<?php
$arr = [
['title' => 'Headline 1', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti cum consectetur odit, necessitatibus ratione ab a molestiae inventore dolorum architecto dolores veniam eligendi, quas sequi iure corporis quia? Natus, provident.', 'date' => '06.01.2017'],
['title' => 'Headline 2', 'content' => 'Ut tenetur laudantium porro accusantium voluptatum commodi facilis quibusdam assumenda expedita enim earum fugiat magnam beatae, officiis inventore, hic perspiciatis harum dolorum.', 'date' => '06.01.2017'],
['title' => 'Headline 3', 'content' => 'Ipsa eos iste maxime porro, at saepe, ratione in tempora consectetur voluptatum et deserunt ullam vitae rem! Non officiis quae maxime sint!', 'date' => '06.01.2017'],
['title' => 'Headline 4', 'content' => 'Accusamus magnam reiciendis aliquid placeat repellendus sapiente nihil ea, debitis, distinctio ipsum odio consequatur doloremque fuga voluptate cumque vero esse! Magni, laboriosam!', 'date' => '06.01.2017'],
['title' => 'Headline 5', 'content' => 'Ipsum quis error officia hic, repellat delectus natus optio quisquam deleniti sit odio quo labore! Voluptas, similique! Ex assumenda, qui non velit!', 'date' => '06.01.2017'],
['title' => 'Headline 6', 'content' => 'Officia minima minus nemo quasi repellat, ducimus! Voluptatum itaque ab dolorem temporibus praesentium, optio nihil necessitatibus harum tempora facilis, mollitia ex laudantium.', 'date' => '06.01.2017'],
['title' => 'Headline 7', 'content' => 'Iste expedita quibusdam incidunt ipsum repudiandae iure cumque magnam fugit laborum blanditiis, dolorum necessitatibus ex. Veniam, error maiores quae explicabo incidunt excepturi.', 'date' => '06.01.2017'],
['title' => 'Headline 8', 'content' => 'Alias nam magni, doloremque aspernatur cum ad eos at iste tempora eveniet, nostrum animi neque obcaecati veniam, et unde. Optio, soluta, tenetur.', 'date' => '06.01.2017']
];
function print_news($arr){
	for ($i=count($arr)-1; $i > count($arr)-6; $i--) { 
		echo "	<h3>" . $arr[$i]['title'] . "</h3>\n";
		echo "	<span>" . $arr[$i]['date'] . "</span>\n";
		echo "	<p>" . substr($arr[$i]['content'], 0, 60) . "</p>\n";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>News Page</title>
	<style type="text/css">
		body { font-family: Arial, Helvetica, sans-serif; }
		h3 { margin: 20px 10px 0 0; }
		span { 
			font-size: 12px;
			color: #73B3E1; 
		}
		p { margin: 10px 0; }
	</style>
</head>
<body>
<?php
print_news($arr)
?>
</body>
</html>