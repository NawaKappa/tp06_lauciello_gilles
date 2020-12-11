import { Component, Input, OnInit } from "@angular/core";
import { Observable, of } from 'rxjs';
import { map } from 'rxjs/operators';
import { ClientApiService } from 'src/app/services/client-api.service';
import { Utilisateur } from 'src/app/shared/Models/utilisateur';

@Component({
  selector: "app-user-info",
  templateUrl: "./user-info.component.html",
  styleUrls: ["./user-info.component.css"]
})
export class UserInfoComponent implements OnInit {

  constructor(private service: ClientApiService) {
  }

  user$: Observable<Utilisateur> ;

  ngOnInit() {
    this.user$ = this.service.getUser();
  }

  logout()
  {
    this.service.logout();
  }
}
