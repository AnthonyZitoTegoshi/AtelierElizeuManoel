<?php

// Procura todos os arquivos com a extensão recursivamente
function getFilesWithExtension($dirPath, $fileExtension) {
	// Cria a instância do array de retorno com os arquivos
	$files = array();
	// Tenta abrir o diretório
	if ($dir = opendir($dirPath)) {
		// Percorre todos os arquivos do diretório
		while ($file = readdir($dir)) {
			// Verifica se o arquivo é válido (não é "." ou "..")
			if ($file != "." && $file != "..") {
				// Acha o caminho completo do arquivo
				$filePath = $dirPath . "\\" . $file;
				// Verifica se o arquivo é um diretório
				if (is_dir($filePath)) {
					// Busca os arquivos dentro desse diretório
					$dirFilesPath = getFilesWithExtension($filePath, $fileExtension);
					// Verifica se há arquivos
					if (count($dirFilesPath) > 0) {
						// Inclui cada arquivo achado dentro do array de retorno
						foreach ($dirFilesPath as $filePath) {
							array_push($files, $filePath);
						}
					}
				} else if ($filePath == substr($filePath, 0, -1 * strlen($fileExtension)) . $fileExtension) {
					// Adiciona o arquivo caso bata com a extensão requerida
					array_push($files, $filePath);
				}
			}
		}
		// Fecha o diretório
		closedir($dir);
	}
	// Retorna os arquivos encontrados
	return $files;
}

// Função para carregar os arquivos automaticamente
spl_autoload_register(function ($classname) {
    // Pega todos os arquivos que podem ser a classe requisitada
    $files = getFilesWithExtension(__DIR__ . "\\..", "$classname.class.php");
    // Requer todos os arquivos
    foreach ($files as $file) {
        require_once($file);
    }
});

?>