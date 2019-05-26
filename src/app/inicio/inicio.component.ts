import { Component, OnInit } from '@angular/core';
import { ApiService } from '../api.service';
import {llamadas} from '../interfaces/llamadas';
import * as $ from 'jquery';
import 'datatables.net';
import 'datatables.net-dt';

@Component({
  selector: 'app-inicio',
  templateUrl: './inicio.component.html',
  styleUrls: ['./inicio.component.css']
})
export class InicioComponent implements OnInit {
  datos:llamadas[]=[];
  src="";
  titulo="La presente información es de todas las sucursales";
  constructor(private apiService:ApiService) {
    apiService.readDatos().subscribe(resul=>{
     
    });

  }
  filtroFechas(){
    
  }
  seleccion(event){
    if (event==1) {
      this.src="/assets/img/bc.png";
      this.titulo="La presente información es de la sucursal de Tijuana, Baja California";
    }else if (event==2) {
      this.src="/assets/img/yc.png";
      this.titulo="La presente información es de la sucursal de Merida, Yucatan";
    }else if (event==3) {
      this.src="/assets/img/gr.png";
      this.titulo="La presente información es de la sucursal de Acapulco, Guerrero";
    }else{
      this.src=null;
      this.titulo="La presente información es de todas las sucursales";
    }
  }
  ngOnInit() {
    $(document).ready(()=>{
      $('#tabla').DataTable();
    })
  }


}
