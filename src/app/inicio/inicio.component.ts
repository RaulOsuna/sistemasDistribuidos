import { Component, OnInit } from '@angular/core';
import { ApiService } from '../api.service';
import { example } from '../ejemplo';
import * as $ from 'jquery';
import 'datatables.net';
import 'datatables.net-dt';
export interface llamadas{
  id:String;
  nombre:String;
}
@Component({
  selector: 'app-inicio',
  templateUrl: './inicio.component.html',
  styleUrls: ['./inicio.component.css']
})
export class InicioComponent implements OnInit {
  datos:string[]=[];
  constructor(private apiService:ApiService) {
    apiService.readDatos().subscribe(resul=>{
     
    });

  }
  filtroFechas(){

  }
  ngOnInit() {
    $(document).ready(()=>{
      $('#tabla').DataTable();
    })
  }


}
