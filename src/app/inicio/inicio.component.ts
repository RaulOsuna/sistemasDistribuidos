import { Component, OnInit } from '@angular/core';
import { ApiService } from '../api.service';
import { example } from '../ejemplo';

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
    llamadas:  example[];
    selectedLlamada:  llamadas  = { id :  null , nombre:null};
  constructor(private apiService:ApiService) {
    

  }

  ngOnInit() {
    this.apiService.readDatos().subscribe((llamadas:example[])=>{
      this.llamadas= llamadas;
      console.log(this.llamadas);
    });
  }


}
