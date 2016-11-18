#!/bin/bash

if [ -e logs/execucao.tmp ]
then 
    echo "Em Execução"
else
    echo "Parado"
fi