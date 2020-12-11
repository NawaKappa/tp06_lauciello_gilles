import {HttpClientModule, HttpClient, HttpHeaders, HttpParams, HttpResponse } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable, of, Subject, throwError } from 'rxjs';
import { catchError, map, tap } from 'rxjs/operators';
import { environment } from 'src/environnements/environnement';
import { Utilisateur } from '../shared/Models/utilisateur';


@Injectable({
  providedIn: 'root'
})
export class ClientApiService {

  constructor(private client: HttpClient) { }

  httpOptions = {
    headers: new HttpHeaders({
    'Content-Type': 'application/json'})};

  public addClient(user: Utilisateur)
  {
    return this.client.post<any>(environment.backendClient + "signin", user, {observe: 'response'})
    .subscribe(response => {
      localStorage.setItem('tokenUser', response.headers.get('Authorization'));
    });
  }

  public login(user: Utilisateur) : Observable<Boolean>
  {
    return this.client.post<any>(environment.backendClient + "login", user, { observe: 'response' })
    .pipe(map(
        response => {
          if (response.status == 200) {
            localStorage.setItem('tokenUser', response.headers.get('Authorization'));
            return true;
          }
          else
          {
            return false;
          }
    }));
  }

  public getUser2() : Observable<Utilisateur>
  {
    return this.client.get<Utilisateur>(environment.backendClient +"info", {
      headers: new HttpHeaders().set(
        "Authorization",
        localStorage.getItem('tokenUser')
      )});
  }

  
  public getUser() : Observable<Utilisateur>
  {
    if(!this.checkTokenValidity())
    {
      return null;
    }
    
    return this.client.get<Utilisateur>(environment.backendClient +
      "info", {
       headers: new HttpHeaders().set(
         "Authorization",
         localStorage.getItem('tokenUser')
       ),
       observe: 'response'}).pipe(map(response => { let user = new Utilisateur();Object.assign(user,response.body);return user}));
  }

  public logout()
  {
    localStorage.removeItem('tokenUser');
  }

  public checkTokenValidity() : Observable<boolean>
  {
    if(!localStorage.getItem('tokenUser'))
    {
      return of(false);
    }


    return this.client.get(environment.backendClient + "auth",  {
      headers: new HttpHeaders().set(
        "Authorization",
        localStorage.getItem('tokenUser')
      ),
      observe: 'response'
    }).pipe(map(
      response =>{
        if(response.status === 200)
        {
          return true;
        }
      },catchError((err) => {
        return of(false);})
      ),catchError((err) => {
        localStorage.removeItem('tokenUser');
        return of(false);}));
  }
}
