import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import {Observable} from 'rxjs';
import {example} from './ejemplo';


@Injectable({
  providedIn: 'root'
})
export class ApiService {
  PHP_API_SERVER:string = "http://127.0.0.1:8080";
  constructor(private httpClient: HttpClient) {}
  readDatos(): Observable<example[]>{
    return this.httpClient.get<example[]>(`${this.PHP_API_SERVER}/api/read.php`);
  }
  createDatos(datos: example): Observable<example>{
    return this.httpClient.post<example>(`${this.PHP_API_SERVER}/api/create.php`, example);
  }

}
