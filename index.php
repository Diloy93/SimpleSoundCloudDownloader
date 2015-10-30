<div align="center">
<form method="get" <?php echo "action '".$_SERVER['PHP_SELF']."'"?> >
 <p>Introduce Url de la Cancion o Lista de canciones</p>
          <input type="url"  name='value' required placeholder="Url Cancion o lista">
        	<input type="submit" class="button postfix" value="Descargar">
</form>
</div>
<?php
if(isset($_GET['value'])){$url=$_GET['value'];$url_api='https://api.soundcloud.com/resolve.json?url='.$url.'&client_id=da2849d8ad5fea67366e4da7444f0152';$json=file_get_contents($url_api);$obj=json_decode($json);if($obj->kind=='playlist'){echo "<div align='center'>";echo "<table>
      <thead>
    <tr>
      <th>#</th>
      <th>Titulo</th>
      <th>Descargar</th>

    </tr>
  </thead>
    <tbody>
";$index=0;foreach($obj->tracks as $key){$url_str=$key->stream_url.'?client_id=da2849d8ad5fea67366e4da7444f0152';$index++;echo "<div class='row collapse'>";echo "<tr>";echo "<td >".$index."</td>";echo "<td>'".$key->title."</td>";echo "<td><a href='http://188.138.17.231/~krafta/dow.php?url=".$url_str."&name=".$key->title."'Descargar>Descargar</a></td>";echo "</tr>
	</div>";}echo "
  </tbody>
</table>";echo "
</div>
</div>";}else{if(is_array($obj)){echo "<div align='center'>";echo "<table>
      <thead>
    <tr>
      <th>#</th>
      <th>Titulo</th>
      <th>Descargar</th>

    </tr>
  </thead>
    <tbody>
";$index=0;foreach($obj as $key){$url_str=$key->stream_url.'?client_id=da2849d8ad5fea67366e4da7444f0152';$index++;echo "<div class='row collapse'>";echo "<tr>";echo "<td >".$index."</td>";echo "<td>'".$key->title."</td>";echo "<td><a href='http://188.138.17.231/~krafta/dow.php?url=".$url_str."&name=".$key->title."'Descargar>Descargar</a></td>";echo "</tr>
	</div>";}echo "
  </tbody>
</table>";echo "
</div>
</div>";}else{$url_str=$obj->stream_url.'?client_id=1edfe9605870313cafeeeca3a1bcf44a';echo "<div align='center'>";echo "<p>".$obj->title."</p><a href='http://188.138.17.231/~krafta/dow.php?url=".$url_str."&name=".$obj->title."'Descargar>Descargar</a></p>";echo "</div>";}}}?>



</div>
</div>
<script type="text/javascript">
$('a').click(function(e) {
    e.preventDefault();
});
</script>
