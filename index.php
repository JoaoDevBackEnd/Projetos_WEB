<?php
     $nu_bola1 = "";
     $nu_bola2 = "";
     $nu_bola3 = "";
     $nu_bola4 = "";
     $nu_bola5 = "";
     $nu_bola6 = "";
$result_num=array();
  $host="sql211.infinityfree.com";
  $db="if0_34649538_mega_sena_concurso";
  $login="if0_34649538";
  $password ="lrVPo55bRINh9a";

  $mysql=new mysqli($host,$login,$password,$db);
  if($mysql-> connect_errno){
    die("Falaha no banco de dados");
  }
  $sql = "SELECT concurso FROM sorteios ORDER BY concurso DESC LIMIT 1";
  $result = $mysql->query($sql);
  
  if ($result->num_rows > 0) {
    // Recupere o valor do último concurso
    $row = $result->fetch_assoc();
    $ultimoConcurso = $row["concurso"];
       // Atribua o valor do último concurso à variável $numeroSorteio
       $numeroSorteio = $ultimoConcurso;

    $sqlbolas= "SELECT bola1,bola2,bola3,bola4,bola5,bola6 FROM sorteios WHERE concurso=$ultimoConcurso";  
    $resultBolas = $mysql->query($sqlbolas);

    if($resultBolas ->num_rows >0){
        $rowBolas=$resultBolas ->fetch_assoc();
        $bolas1=$rowBolas["bola1"];
        $bolas2=$rowBolas["bola2"];
        $bolas3=$rowBolas["bola3"];
        $bolas4=$rowBolas["bola4"];
        $bolas5=$rowBolas["bola5"];
        $bolas6=$rowBolas["bola6"];
    }
  }

  if(isset($_POST['n_concurso'])){
    
    $n_concurso=$_POST['n_concurso'];
    $num_concurso="SELECT bola1,bola2,bola3,bola4,bola5,bola6 FROM sorteios WHERE concurso=$n_concurso";
    $sql_num_concurso=$mysql ->query($num_concurso);
    if($sql_num_concurso -> num_rows >0){
       $row_concurso=$sql_num_concurso ->fetch_assoc();
       $nu_bola1=$row_concurso["bola1"];
       $nu_bola2=$row_concurso["bola2"];
       $nu_bola3=$row_concurso["bola3"];
       $nu_bola4=$row_concurso["bola4"];
       $nu_bola5=$row_concurso["bola5"];
       $nu_bola6=$row_concurso["bola6"];
    }
  }
 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <div class="topnav" id="myTopnav">
        <h2>CRIADO POR JOÃO VICTOR DE SOUZA </h2>
        </a>
    </div>
</head>
<body>

<div>     
<h1 style=" top:200px">ÚLTIMO CONCURSO: <?php echo $numeroSorteio ?></h1>         
</div>
<div class="center-content">
<table border="1" cellpending="10">            
            <thead>
          
            </thead>
              <tbody>
               
                <th style="padding: 20px;"><?php echo $bolas1; ?></th>
                <th style="padding: 20px;"><?php echo $bolas2; ?></th>
                <th style="padding: 20px;"><?php echo $bolas3; ?></th>
                <th style="padding: 20px;"><?php echo $bolas4; ?></th>
                <th style="padding: 20px;"><?php echo $bolas5; ?></th>
                <th style="padding: 20px;"><?php echo $bolas6; ?></th>               
              </tbody>
        </table>
    </div>
    <H1>PESQUISA DE JOGOS</H1>
<form method="POST" action="">
  <p>
    <label for="n_concurso">CONCURSO N°</label>
    <input id="n_concurso" name="n_concurso" type="number">
  </p>
  <button type="submit">PESQUISAR</button>
  <h2>Concurso: <?php echo $n_concurso?></h2>
</form>
<div class="center-content">
<table border="1" cellpending="10">            
            <thead>
          
            </thead>
              <tbody>
               
                <th style="padding: 20px;"><?php echo $nu_bola1; ?></th>
                <th style="padding: 20px;"><?php echo $nu_bola2; ?></th>
                <th style="padding: 20px;"><?php echo $nu_bola3; ?></th>
                <th style="padding: 20px;"><?php echo $nu_bola4; ?></th>
                <th style="padding: 20px;"><?php echo $nu_bola5; ?></th>
                <th style="padding: 20px;"><?php echo $nu_bola6; ?></th>               
              </tbody>
        </table>
    </div>

<h1> NÚMEROS MAIS SORTEADOS</h1>
        
        <div class="columns">
  <table>
    <tr>
      <th>Número</th>
      <th>Contagem</th>
    </tr>
    <?php
    for ($i = 1; $i <= 20; $i++) {
      $num_sorteados = "SELECT COUNT(*) AS count FROM sorteios WHERE bola1 = $i OR bola2 = $i OR bola3 = $i OR bola4 = $i OR bola5 = $i OR bola6 = $i";
      $result_num_sorteados = $mysql->query($num_sorteados);

      if ($result_num_sorteados) {
        $row = $result_num_sorteados->fetch_assoc();
        $count = $row['count'];
        echo "<tr><td class=\"number\">$i</td><td class=\"count\">$count</td></tr>";
      }
    }
    ?>
  </table>

  <table>
    <tr>
      <th>Número</th>
      <th>Contagem</th>
    </tr>
    <?php
    for ($i = 21; $i <=40; $i++) {
      $num_sorteados = "SELECT COUNT(*) AS count FROM sorteios WHERE bola1 = $i OR bola2 = $i OR bola3 = $i OR bola4 = $i OR bola5 = $i OR bola6 = $i";
      $result_num_sorteados = $mysql->query($num_sorteados);

      if ($result_num_sorteados) {
        $row = $result_num_sorteados->fetch_assoc();
        $count = $row['count'];
        echo "<tr><td class=\"number\">$i</td><td class=\"count\">$count</td></tr>";
      }
    }
    ?>
  </table>

  <table>
    <tr>
      <th>Número</th>
      <th>Contagem</th>
    </tr>
    <?php
    for ($i = 41; $i <= 60; $i++) {
      $num_sorteados = "SELECT COUNT(*) AS count FROM sorteios WHERE bola1 = $i OR bola2 = $i OR bola3 = $i OR bola4 = $i OR bola5 = $i OR bola6 = $i";
      $result_num_sorteados = $mysql->query($num_sorteados);

      if ($result_num_sorteados) {
        $row = $result_num_sorteados->fetch_assoc();
        $count = $row['count'];
        echo "<tr><td class=\"number\">$i</td><td class=\"count\">$count</td></tr>";
      }
    }
    ?>
  </table>
</div>


</body>
</html>