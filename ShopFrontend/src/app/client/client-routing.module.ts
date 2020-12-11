import { NgModule } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";
import { AuthGuard } from '../auth.guard';
import { ConnexionComponent } from './connexion/connexion.component';
import { FormulaireComponent } from "./formulaire/formulaire.component";
import { UserInfoComponent } from './user-info/user-info.component';

const routes: Routes = [
  {
    path: "connexion",
    component: ConnexionComponent,
  },
  {
    path: "formulaire",
    component: FormulaireComponent
  },
  {
    path: "",
    component: UserInfoComponent,
    canActivate: [AuthGuard]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],

  exports: [RouterModule]
})
export class ClientRoutingModule {}
