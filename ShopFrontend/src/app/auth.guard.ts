import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, UrlTree, Router } from '@angular/router';
import { Observable, Subject } from 'rxjs';
import { of } from 'rxjs/internal/observable/of';
import { catchError, map} from 'rxjs/operators';
import { ClientApiService } from './services/client-api.service';


@Injectable({
  providedIn: 'root'
})
export class AuthGuard implements CanActivate {
  constructor(
    private router: Router,
    private service: ClientApiService
) {
}


canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot) : Observable<boolean> {

  return this.service.checkTokenValidity().pipe(
    map(e => {
      if (e==true) {
        return true;
      }
      else{
        this.router.navigate(['/client/connexion'], { queryParams: { returnUrl: state.url } });
        return false;
      }
    }),
    catchError((err) => {
      this.router.navigate(['/client/connexion'], { queryParams: { returnUrl: state.url } });
      return of(false);
    }));
}
  
}
