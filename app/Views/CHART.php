<!DOCTYPE html>
<html>
<head>
    <style>
        .bar {
            fill: green;
        }

        .highlight {
            fill: red;
        }

        .title {
            fill: blue;
            font-weight: bold;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
    <script src = "https://d3js.org/d3.v4.min.js"></script>
    <title> Animated bar chart </title>
</head>

<body>
<?php include '../templates/menuTopBack.html'?>
<div class="container-fluid">
    <div class="row h-100">
        <?php include '../templates/menuBack.php'?>
        <div class="col mx-3" style="margin-top: 102px">

            <div style="margin-bottom: 33vh">
                <svg class="mt-5" width = "500" height = "500"></svg>
            </div>
        </div>
    </div>
</div>
<script>
    var svg = d3.select("svg"),
        margin = 200, width = svg.attr("width") - margin,
        height = svg.attr("height") - margin;

    svg.append("text")
        .attr("transform", "translate(100,0)")
        .attr("x", 50).attr("y", 50)
        .attr("font-size", "20px")
        .attr("class", "title")
        .text("Seguidors bar chart");

    var x = d3.scaleBand().range([0, width]).padding(0.4),
        y = d3.scaleLinear().range([height, 0]);

    var g = svg.append("g")
        .attr("transform", "translate(" + 100 + "," + 100 + ")");

    d3.json("http://www.goatrails.dawman.info/api/user", function(error, data) {
        if (error) {
            throw error;
        }

        x.domain(data.map(function(d) { return d.id; }));
        y.domain([0, d3.max(data, function(d) { return d.followers_num; })]);

        g.append("g")
            .attr("transform", "translate(0," + height + ")")
            .call(d3.axisBottom(x))
            .append("text")
            .attr("y", height - 250)
            .attr("x", width - 100)
            .attr("text-anchor", "end")
            .attr("font-size", "18px")
            .attr("stroke", "blue")
            .text("id-user");

        g.append("g")
            .append("text")
            .attr("transform", "rotate(-90)")
            .attr("y", 6)
            .attr("dy", "-5.1em")
            .attr("text-anchor", "end")
            .attr("font-size", "18px")
            .attr("stroke", "blue")
            .text("seguidors");

        g.append("g")
            .attr("transform", "translate(0, 0)")
            .call(d3.axisLeft(y));

        g.selectAll(".bar")
            .data(data)
            .enter()
            .append("rect")
            .attr("class", "bar")
            .on("mouseover", onMouseOver)
            .on("mouseout", onMouseOut)
            .attr("x", function(d) { return x(d.id); })
            .attr("y", function(d) { return y(d.followers_num); })
            .attr("width", x.bandwidth()).transition()
            .ease(d3.easeLinear).duration(200)
            .delay(function (d, i) {
                return i * 25;
            })

            .attr("height", function(d) { return height - y(d.followers_num); });
    });


    function onMouseOver(d, i) {
        d3.select(this)
            .attr('class', 'highlight');

        d3.select(this)
            .transition()
            .duration(200)
            .attr('width', x.bandwidth() + 5)
            .attr("y", function(d) { return y(d.followers_num) - 10; })
            .attr("height", function(d) { return height - y(d.followers_num) + 10; });

        g.append("text")
            .attr('class', 'val')
            .attr('x', function() {
                return x(d.id);
            })

            .attr('y', function() {
                return y(d.id) - 10;
            })
    }

    function onMouseOut(d, i) {

        d3.select(this)
            .attr('class', 'bar');

        d3.select(this)
            .transition()
            .duration(200)
            .attr('width', x.bandwidth())
            .attr("y", function(d) { return y(d.followers_num); })
            .attr("height", function(d) { return height - y(d.followers_num); });

        d3.selectAll('.val')
            .remove()
    }
</script>
</body>
</html>