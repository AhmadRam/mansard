@extends('layouts.app')
@section('content')
<title>History</title>
<h1 class="title">{{__('Brand')}}</h1>
<article class="item">
	<header>
		<h2 class="title">{{__('Beauty Advice')}}</h2>
	</header>
	<div class="content clearfix">
		<p style="text-align: justify;"><img class="inset-right" src="../../images/deco-site/Herboristerie_casiers.jpg" alt="Herboristerie casiers" width="400" height="267" /></p>
		<table>
			<tbody>
				<tr>
					<td>
						<p style="text-align: justify;">{{__('Normal skin')}}
							<br>
						<p style="text-align: justify;">
							{{__('Morning: Phyto Visage and Crème Douce de Jour')}}<br>
							{{__('Evening: Phyto Visage and Crème Douce de Nuit')}}<br>
							{{__('1-2 times/week: Exfoliant Délicat Naturel')}}
						</p>
						<p style="text-align: justify;">{{__('Dry skin')}}
							<br>
							{{__('Morning: Phyto Visage and Crème #1 Nutritive')}}<br>
							{{__('Evening: Phyto Visage and Crème #6 Plein Vent')}}<br>
							{{__('1 times/ week: Exfoliant Délicat Naturel and Masque Hydratant Apaisant')}}<br>
							{{__('As a course: Sérum N 24 Hydratation Cellulaire')}}
						</p>
					</td>
				</tr>
			</tbody>
		</table>
		<p style="text-align: justify;">{{__('Small blemishes and imperfections')}}
			<br>
			{{__('Morning: Phyto Purifiant and Crème Douce de Jour / Fluide Hydratanat Matifiant')}}<br>
			{{__('Evening: Phyto Purifiant and Crème Douce de Jour or Crème Phyto Détoxiquante few times a week')}}<br>
			{{__('1-2 times/week: Exfoliant Délicat Naturel and Masque Pureté Rééquilibrant')}}<br>
			{{__('As a course: Sérum N 23 Pureté Contrôle')}}
		</p>
		<table>
			<tbody>
				<tr>
					<td>
						<p>{{__('Sensitive skin and irritations')}}<br>
							{{__('Morning: Phyto Visage and Phyto Flash (10-15 min on the fine lines), afterwards use Crème #1 Nutritive')}}<br>
							{{__('Evening: Phyto Visage and Crème Phyto Détoxiquante alternating with Crème Douce de Nuit')}}<br>
							{{__('1 times/week: Exfoliant Délicat Naturel and Masque Hydratant Apaisant')}}<br>
							{{__("As a course: Sérum N 21 Désensibilisant à l'Azulène")}}
						</p>
					</td>
				</tr>
			</tbody>
		</table>

		<table>
			<tbody>
				<tr>
					<td>
						<p style="text-align: justify;">{{__('Oily problem skin')}}<br>
							{{__('Morning: Phyto Purifiant (insist on the problem areas) and Crème #3 Purifiante')}}<br>
							{{__('Evening: Phyto Purifiant (insist on the problem areas) and Crème Phyto Détoxiquante')}}<br>
							{{__('1-2 times/week: Exfoliant Délicat Naturel and Masque Pureté Rééquilibrant')}}<br>
							{{__('As a course: Sérum N 23 Pureté Contrôle')}}

						</p>
						<p style="text-align: justify;">{{__('Lack of tone, fine lines and wrinkles')}}<br>
							{{__('Morning: Phyto Visage and Phyto Flash (10-15 min on the fine lines), afterwards use Crème Top Fermandé Anti Rides / Fluide Jeunesse Celluliare.')}}<br>
							{{__('Evening: Phyto Visage and Phyto Flash (10-15 min on the fine lines), afterwards use Crème #2Régénératrice.')}}<br>
							{{__('1-2 times/ week: Exfoliant Délicat Naturel and Masque Raffermissant Jeunesse')}}<br>
							{{__("As a course: Sérum N 28 Collagène Vital / Sérum N 27 Elastine Fondamentale / Sérum N 25 Anti Rides D'Expression")}}
						</p>
						<p style="text-align: justify;">{{__('Tired skin, lack of radiance')}}<br>
							{{__('Morning: Phyto Visage and Phyto Flash, afterwards Crème Top Fermandé Anti Rides')}}<br>
							{{__('Evening: Phyto Visage and Crème #6 Plein-Vent')}}<br>
							{{__('1-2 times/ week: Exfoliant Délicat Naturel and Masque Hydratant Apaisant')}}
						</p>
						<p style="text-align: justify;"></p>
						<p style="text-align: justify;"></p>
						<p style="text-align: justify;">&nbsp;</p>
						<table>
							<tbody>
								<tr>
									<td>
										<p style="text-align: justify;"></p>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</article>
@endsection