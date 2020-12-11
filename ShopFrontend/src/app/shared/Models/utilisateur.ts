export class Utilisateur {
  nom: string;
  prenom: string;
  sexe: string;
  adresse: string;
  ville: string;
  codepostal: string;
  email: string;
  login: string;
  telephone: string;
  password: string;

  public constructor(init?: Partial<Utilisateur>) {
    Object.assign(this, init);
  }
}
