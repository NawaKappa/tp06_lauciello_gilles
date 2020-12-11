import { NgModule } from "@angular/core";
import { BrowserModule } from "@angular/platform-browser";
import { FormsModule } from "@angular/forms";

import { UserInfoComponent } from "./user-info/user-info.component";
import { FormulaireComponent } from "./formulaire/formulaire.component";
import { ClientRoutingModule } from "./client-routing.module";
import { MustMatchDirective } from "./_helpers/must-match.directive";
import { PhonePipePipe } from "./_helpers/phone-pipe.pipe";
import { OnlyLetterDirective } from "./_helpers/only-letter.directive";
import { CommonModule } from "@angular/common";
import { AppComponent } from "../app.component";
import { ConnexionComponent } from './connexion/connexion.component';

@NgModule({
  imports: [CommonModule, FormsModule, ClientRoutingModule],
  declarations: [
    UserInfoComponent,
    FormulaireComponent,
    MustMatchDirective,
    PhonePipePipe,
    OnlyLetterDirective,
    ConnexionComponent
  ],
})
export class ClientModule {}
