<!-- bdfunc.php-->
<!-- funções para auxiliar o preenchimento dos formularios -->
<!-- 10.jun.2017-->


<?php
	//a funcao recupera dados distintos de alguma tabela para criar formularios interativos

function pulldown ($banco, $tabela, $coluna){

	return consulta($banco, "SELECT DISTINCT $coluna FROM $tabela  ORDER BY $coluna;");
}