
<div id="bra_portfolio_only">
<div id="brankic_shortcode_form_wrapper">
<form id="brankic_shortcode_form" name="brankic_shortcode_form" method="post" action="">
  <p>
    <label>Title above items</label>
      <input type="text" name="title" id="title" value="Recent Work" size="50"/>
  </p>
  
  <p>
    <label>Items to show (-1: all)</label>
      <input type="text" name="no" id="no" value="-1" size="5"/>
  </p>
  
  <p>
    <label>Category to show</label>
<?php
include("portfolio_select.txt");
?>

  </p>
  
  <p>
    <label>Show filters</label>
      <select  name="show_filters" id="show_filters">
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>
  </p>
  
  <p>
    <label>Columns</label>
      <select name="columns" id="columns">
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
  </p>

  <p>
    <label>Shape</label>
      <select name="shape" id="shape">
        <option value="">None</option>
        <option value="hexagon">Hexagon</option>
        <option value="circle">Circle</option>
        <option value="triangle">Triangle</option>
      </select>
  </p>
  
  <p>
    <label>Hover active</label>
      <select  name="hover" id="hover">
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>
  </p>
  
  <p>
    <label>Height</label>
      <input type="text" name="height" id="height" value="" size="5"/>
  </p>
  
    
  <p>
      <input type="submit" name="Insert" id="bra_insert_shortcode_button" value="Submit" />
  </p>
</form>
</div>
</div>
