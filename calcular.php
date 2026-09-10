<?php
$nome = $_POST['tnome'];
$anoNasc = (int) $_POST['tano'];
$anoAtual = (int) date('Y');

// Processamento
$idade = $anoAtual - $anoNasc;

// Dias, horas e minutos vividos (aproximado)
$diasVividos = $idade * 365;
$horasVividas = $diasVividos * 24;
$minutosVividos = $horasVividas * 60;

// Médias
$bpmMedio = 75;              // batimentos por minuto
$respiracaoPorMinuto = 17;   // respirações por minuto

// Totais já realizados
$batimentosTotais = $minutosVividos * $bpmMedio;
$respiracoesTotais = $minutosVividos * $respiracaoPorMinuto;

// Expectativa de vida e restantes
$expectativaVida = 95;
$anosRestantes = $expectativaVida - $idade;
$minutosRestantes = $anosRestantes * 365 * 24 * 60;
$batimentosRestantes = $minutosRestantes * $bpmMedio;
$respiracoesRestantes = $minutosRestantes * $respiracaoPorMinuto;

// Saída
echo "<h2>Olá, $nome!</h2>";
echo "<p>Sua idade atual é: <strong>$idade anos</strong></p>";
echo "<p>Você já viveu aproximadamente: <strong>" . number_format($diasVividos, 0, ',', '.') . " dias</strong></p>";
echo "<p>Considerando uma média de $bpmMedio batimentos por minuto, seu coração já bateu aproximadamente: <strong>" . number_format($batimentosTotais, 0, ',', '.') . " vezes</strong></p>";
echo "<p>Considerando uma média de $respiracaoPorMinuto respirações por minuto, você já respirou aproximadamente: <strong>" . number_format($respiracoesTotais, 0, ',', '.') . " vezes</strong></p>";
echo "<hr>";
echo "<p>Considerando uma expectativa de vida de $expectativaVida anos, ainda restam aproximadamente:</p>";
echo "<ul>";
echo "<li><strong>$anosRestantes anos</strong></li>";
echo "<li><strong>" . number_format($batimentosRestantes, 0, ',', '.') . " batimentos cardíacos</strong></li>";
echo "<li><strong>" . number_format($respiracoesRestantes, 0, ',', '.') . " respirações</strong></li>";
echo "</ul>";
?>