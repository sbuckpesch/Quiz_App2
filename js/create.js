//when load page, show part1
function show_part_init()
{
  jQuery("#part1").show();
  jQuery("#part2").hide();
  jQuery("#part3").hide();
}
//show part1 form
function show_part1()
{
  jQuery("#part1").show();
  jQuery("#part2").hide();
  jQuery("#part3").hide();
}
//show part2 form
function show_part2()
{
  jQuery("#part1").hide();
  jQuery("#part2").show();
  jQuery("#part3").hide();
}
//show part3 form
function show_part3()
{
  jQuery("#part1").hide();
  jQuery("#part2").hide();
  jQuery("#part3").show();
}
