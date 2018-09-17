<?php

declare(strict_types=1);

/*
 * This file is part of boo/bnet.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Boo\BattleNet\Tests;

use Boo\BattleNet\Utils;
use Error;
use PHPUnit\Framework\TestCase;
use RuntimeException;

/**
 * @internal
 * @covers \Boo\BattleNet\Utils
 */
final class UtilsTest extends TestCase
{
    /**
     * Returns realm names as well as their expected slugs.
     *
     * @return array<array<string>>
     */
    public function realmProvider(): array
    {
        return [
            [
                'aegwynn',
                'Aegwynn',
            ],
            [
                'aerie-peak',
                'Aerie Peak',
            ],
            [
                'agamaggan',
                'Agamaggan',
            ],
            [
                'aggra-portugues',
                'Aggra (Português)',
            ],
            [
                'aggramar',
                'Aggramar',
            ],
            [
                'ahnqiraj',
                'Ahn\'Qiraj',
            ],
            [
                'alakir',
                'Al\'Akir',
            ],
            [
                'alexstrasza',
                'Alexstrasza',
            ],
            [
                'alleria',
                'Alleria',
            ],
            [
                'alonsus',
                'Alonsus',
            ],
            [
                'amanthul',
                'Aman\'Thul',
            ],
            [
                'ambossar',
                'Ambossar',
            ],
            [
                'anachronos',
                'Anachronos',
            ],
            [
                'anetheron',
                'Anetheron',
            ],
            [
                'antonidas',
                'Antonidas',
            ],
            [
                'anubarak',
                'Anub\'arak',
            ],
            [
                'arakarahm',
                'Arak-arahm',
            ],
            [
                'arathi',
                'Arathi',
            ],
            [
                'arathor',
                'Arathor',
            ],
            [
                'archimonde',
                'Archimonde',
            ],
            [
                'area-52',
                'Area 52',
            ],
            [
                'argent-dawn',
                'Argent Dawn',
            ],
            [
                'arthas',
                'Arthas',
            ],
            [
                'arygos',
                'Arygos',
            ],
            [
                'ashenvale',
                'Ashenvale',
            ],
            [
                'aszune',
                'Aszune',
            ],
            [
                'auchindoun',
                'Auchindoun',
            ],
            [
                'azjolnerub',
                'Azjol-Nerub',
            ],
            [
                'azshara',
                'Azshara',
            ],
            [
                'azuregos',
                'Azuregos',
            ],
            [
                'azuremyst',
                'Azuremyst',
            ],
            [
                'baelgun',
                'Baelgun',
            ],
            [
                'balnazzar',
                'Balnazzar',
            ],
            [
                'blackhand',
                'Blackhand',
            ],
            [
                'blackmoore',
                'Blackmoore',
            ],
            [
                'blackrock',
                'Blackrock',
            ],
            [
                'blackscar',
                'Blackscar',
            ],
            [
                'blades-edge',
                'Blade\'s Edge',
            ],
            [
                'bladefist',
                'Bladefist',
            ],
            [
                'bloodfeather',
                'Bloodfeather',
            ],
            [
                'bloodhoof',
                'Bloodhoof',
            ],
            [
                'bloodscalp',
                'Bloodscalp',
            ],
            [
                'blutkessel',
                'Blutkessel',
            ],
            [
                'booty-bay',
                'Booty Bay',
            ],
            [
                'borean-tundra',
                'Borean Tundra',
            ],
            [
                'boulderfist',
                'Boulderfist',
            ],
            [
                'bronze-dragonflight',
                'Bronze Dragonflight',
            ],
            [
                'bronzebeard',
                'Bronzebeard',
            ],
            [
                'burning-blade',
                'Burning Blade',
            ],
            [
                'burning-legion',
                'Burning Legion',
            ],
            [
                'burning-steppes',
                'Burning Steppes',
            ],
            [
                'cthun',
                'C\'Thun',
            ],
            [
                'chamber-of-aspects',
                'Chamber of Aspects',
            ],
            [
                'chants-eternels',
                'Chants éternels',
            ],
            [
                'chogall',
                'Cho\'gall',
            ],
            [
                'chromaggus',
                'Chromaggus',
            ],
            [
                'colinas-pardas',
                'Colinas Pardas',
            ],
            [
                'confrerie-du-thorium',
                'Confrérie du Thorium',
            ],
            [
                'conseil-des-ombres',
                'Conseil des Ombres',
            ],
            [
                'crushridge',
                'Crushridge',
            ],
            [
                'culte-de-la-rive-noire',
                'Culte de la Rive noire',
            ],
            [
                'daggerspine',
                'Daggerspine',
            ],
            [
                'dalaran',
                'Dalaran',
            ],
            [
                'dalvengyr',
                'Dalvengyr',
            ],
            [
                'darkmoon-faire',
                'Darkmoon Faire',
            ],
            [
                'darksorrow',
                'Darksorrow',
            ],
            [
                'darkspear',
                'Darkspear',
            ],
            [
                'das-konsortium',
                'Das Konsortium',
            ],
            [
                'das-syndikat',
                'Das Syndikat',
            ],
            [
                'deathguard',
                'Deathguard',
            ],
            [
                'deathweaver',
                'Deathweaver',
            ],
            [
                'deathwing',
                'Deathwing',
            ],
            [
                'deepholm',
                'Deepholm',
            ],
            [
                'defias-brotherhood',
                'Defias Brotherhood',
            ],
            [
                'dentarg',
                'Dentarg',
            ],
            [
                'der-mithrilorden',
                'Der Mithrilorden',
            ],
            [
                'der-rat-von-dalaran',
                'Der Rat von Dalaran',
            ],
            [
                'der-abyssische-rat',
                'Der abyssische Rat',
            ],
            [
                'destromath',
                'Destromath',
            ],
            [
                'dethecus',
                'Dethecus',
            ],
            [
                'die-aldor',
                'Die Aldor',
            ],
            [
                'die-arguswacht',
                'Die Arguswacht',
            ],
            [
                'die-nachtwache',
                'Die Nachtwache',
            ],
            [
                'die-silberne-hand',
                'Die Silberne Hand',
            ],
            [
                'die-todeskrallen',
                'Die Todeskrallen',
            ],
            [
                'die-ewige-wacht',
                'Die ewige Wacht',
            ],
            [
                'doomhammer',
                'Doomhammer',
            ],
            [
                'draenor',
                'Draenor',
            ],
            [
                'dragonblight',
                'Dragonblight',
            ],
            [
                'dragonmaw',
                'Dragonmaw',
            ],
            [
                'drakthul',
                'Drak\'thul',
            ],
            [
                'drekthar',
                'Drek\'Thar',
            ],
            [
                'dun-modr',
                'Dun Modr',
            ],
            [
                'dun-morogh',
                'Dun Morogh',
            ],
            [
                'dunemaul',
                'Dunemaul',
            ],
            [
                'durotan',
                'Durotan',
            ],
            [
                'earthen-ring',
                'Earthen Ring',
            ],
            [
                'echsenkessel',
                'Echsenkessel',
            ],
            [
                'eitrigg',
                'Eitrigg',
            ],
            [
                'eldrethalas',
                'Eldre\'Thalas',
            ],
            [
                'elune',
                'Elune',
            ],
            [
                'emerald-dream',
                'Emerald Dream',
            ],
            [
                'emeriss',
                'Emeriss',
            ],
            [
                'eonar',
                'Eonar',
            ],
            [
                'eredar',
                'Eredar',
            ],
            [
                'eversong',
                'Eversong',
            ],
            [
                'executus',
                'Executus',
            ],
            [
                'exodar',
                'Exodar',
            ],
            [
                'festung-der-sturme',
                'Festung der Stürme',
            ],
            [
                'fordragon',
                'Fordragon',
            ],
            [
                'forscherliga',
                'Forscherliga',
            ],
            [
                'frostmane',
                'Frostmane',
            ],
            [
                'frostmourne',
                'Frostmourne',
            ],
            [
                'frostwhisper',
                'Frostwhisper',
            ],
            [
                'frostwolf',
                'Frostwolf',
            ],
            [
                'galakrond',
                'Galakrond',
            ],
            [
                'garona',
                'Garona',
            ],
            [
                'garrosh',
                'Garrosh',
            ],
            [
                'genjuros',
                'Genjuros',
            ],
            [
                'ghostlands',
                'Ghostlands',
            ],
            [
                'gilneas',
                'Gilneas',
            ],
            [
                'goldrinn',
                'Goldrinn',
            ],
            [
                'gordunni',
                'Gordunni',
            ],
            [
                'gorgonnash',
                'Gorgonnash',
            ],
            [
                'greymane',
                'Greymane',
            ],
            [
                'grim-batol',
                'Grim Batol',
            ],
            [
                'grom',
                'Grom',
            ],
            [
                'guldan',
                'Gul\'dan',
            ],
            [
                'hakkar',
                'Hakkar',
            ],
            [
                'haomarush',
                'Haomarush',
            ],
            [
                'hellfire',
                'Hellfire',
            ],
            [
                'hellscream',
                'Hellscream',
            ],
            [
                'howling-fjord',
                'Howling Fjord',
            ],
            [
                'hyjal',
                'Hyjal',
            ],
            [
                'illidan',
                'Illidan',
            ],
            [
                'jaedenar',
                'Jaedenar',
            ],
            [
                'kaelthas',
                'Kael\'thas',
            ],
            [
                'karazhan',
                'Karazhan',
            ],
            [
                'kargath',
                'Kargath',
            ],
            [
                'kazzak',
                'Kazzak',
            ],
            [
                'kelthuzad',
                'Kel\'Thuzad',
            ],
            [
                'khadgar',
                'Khadgar',
            ],
            [
                'khaz-modan',
                'Khaz Modan',
            ],
            [
                'khazgoroth',
                'Khaz\'goroth',
            ],
            [
                'kiljaeden',
                'Kil\'jaeden',
            ],
            [
                'kilrogg',
                'Kilrogg',
            ],
            [
                'kirin-tor',
                'Kirin Tor',
            ],
            [
                'korgall',
                'Kor\'gall',
            ],
            [
                'kragjin',
                'Krag\'jin',
            ],
            [
                'krasus',
                'Krasus',
            ],
            [
                'kul-tiras',
                'Kul Tiras',
            ],
            [
                'kult-der-verdammten',
                'Kult der Verdammten',
            ],
            [
                'la-croisade-ecarlate',
                'La Croisade écarlate',
            ],
            [
                'laughing-skull',
                'Laughing Skull',
            ],
            [
                'les-clairvoyants',
                'Les Clairvoyants',
            ],
            [
                'les-sentinelles',
                'Les Sentinelles',
            ],
            [
                'lich-king',
                'Lich King',
            ],
            [
                'lightbringer',
                'Lightbringer',
            ],
            [
                'lightnings-blade',
                'Lightning\'s Blade',
            ],
            [
                'lordaeron',
                'Lordaeron',
            ],
            [
                'los-errantes',
                'Los Errantes',
            ],
            [
                'lothar',
                'Lothar',
            ],
            [
                'madmortem',
                'Madmortem',
            ],
            [
                'magtheridon',
                'Magtheridon',
            ],
            [
                'malganis',
                'Mal\'Ganis',
            ],
            [
                'malfurion',
                'Malfurion',
            ],
            [
                'malorne',
                'Malorne',
            ],
            [
                'malygos',
                'Malygos',
            ],
            [
                'mannoroth',
                'Mannoroth',
            ],
            [
                'marecage-de-zangar',
                'Marécage de Zangar',
            ],
            [
                'mazrigos',
                'Mazrigos',
            ],
            [
                'medivh',
                'Medivh',
            ],
            [
                'minahonda',
                'Minahonda',
            ],
            [
                'moonglade',
                'Moonglade',
            ],
            [
                'mugthol',
                'Mug\'thol',
            ],
            [
                'nagrand',
                'Nagrand',
            ],
            [
                'nathrezim',
                'Nathrezim',
            ],
            [
                'naxxramas',
                'Naxxramas',
            ],
            [
                'nazjatar',
                'Nazjatar',
            ],
            [
                'nefarian',
                'Nefarian',
            ],
            [
                'nemesis',
                'Nemesis',
            ],
            [
                'neptulon',
                'Neptulon',
            ],
            [
                'nerzhul',
                'Ner\'zhul',
            ],
            [
                'nerathor',
                'Nera\'thor',
            ],
            [
                'nethersturm',
                'Nethersturm',
            ],
            [
                'nordrassil',
                'Nordrassil',
            ],
            [
                'norgannon',
                'Norgannon',
            ],
            [
                'nozdormu',
                'Nozdormu',
            ],
            [
                'onyxia',
                'Onyxia',
            ],
            [
                'outland',
                'Outland',
            ],
            [
                'perenolde',
                'Perenolde',
            ],
            [
                'pozzo-delleternita',
                'Pozzo dell\'Eternità',
            ],
            [
                'proudmoore',
                'Proudmoore',
            ],
            [
                'quelthalas',
                'Quel\'Thalas',
            ],
            [
                'ragnaros',
                'Ragnaros',
            ],
            [
                'rajaxx',
                'Rajaxx',
            ],
            [
                'rashgarroth',
                'Rashgarroth',
            ],
            [
                'ravencrest',
                'Ravencrest',
            ],
            [
                'ravenholdt',
                'Ravenholdt',
            ],
            [
                'razuvious',
                'Razuvious',
            ],
            [
                'rexxar',
                'Rexxar',
            ],
            [
                'runetotem',
                'Runetotem',
            ],
            [
                'sanguino',
                'Sanguino',
            ],
            [
                'sargeras',
                'Sargeras',
            ],
            [
                'saurfang',
                'Saurfang',
            ],
            [
                'scarshield-legion',
                'Scarshield Legion',
            ],
            [
                'senjin',
                'Sen\'jin',
            ],
            [
                'shadowsong',
                'Shadowsong',
            ],
            [
                'shattered-halls',
                'Shattered Halls',
            ],
            [
                'shattered-hand',
                'Shattered Hand',
            ],
            [
                'shattrath',
                'Shattrath',
            ],
            [
                'shendralar',
                'Shen\'dralar',
            ],
            [
                'silvermoon',
                'Silvermoon',
            ],
            [
                'sinstralis',
                'Sinstralis',
            ],
            [
                'skullcrusher',
                'Skullcrusher',
            ],
            [
                'soulflayer',
                'Soulflayer',
            ],
            [
                'spinebreaker',
                'Spinebreaker',
            ],
            [
                'sporeggar',
                'Sporeggar',
            ],
            [
                'steamwheedle-cartel',
                'Steamwheedle Cartel',
            ],
            [
                'stormrage',
                'Stormrage',
            ],
            [
                'stormreaver',
                'Stormreaver',
            ],
            [
                'stormscale',
                'Stormscale',
            ],
            [
                'sunstrider',
                'Sunstrider',
            ],
            [
                'sylvanas',
                'Sylvanas',
            ],
            [
                'taerar',
                'Taerar',
            ],
            [
                'talnivarr',
                'Talnivarr',
            ],
            [
                'tarren-mill',
                'Tarren Mill',
            ],
            [
                'teldrassil',
                'Teldrassil',
            ],
            [
                'temple-noir',
                'Temple noir',
            ],
            [
                'terenas',
                'Terenas',
            ],
            [
                'terokkar',
                'Terokkar',
            ],
            [
                'terrordar',
                'Terrordar',
            ],
            [
                'the-maelstrom',
                'The Maelstrom',
            ],
            [
                'the-shatar',
                'The Sha\'tar',
            ],
            [
                'the-venture-co',
                'The Venture Co',
            ],
            [
                'theradras',
                'Theradras',
            ],
            [
                'thermaplugg',
                'Thermaplugg',
            ],
            [
                'thrall',
                'Thrall',
            ],
            [
                'throkferoth',
                'Throk\'Feroth',
            ],
            [
                'thunderhorn',
                'Thunderhorn',
            ],
            [
                'tichondrius',
                'Tichondrius',
            ],
            [
                'tirion',
                'Tirion',
            ],
            [
                'todeswache',
                'Todeswache',
            ],
            [
                'trollbane',
                'Trollbane',
            ],
            [
                'turalyon',
                'Turalyon',
            ],
            [
                'twilights-hammer',
                'Twilight\'s Hammer',
            ],
            [
                'twisting-nether',
                'Twisting Nether',
            ],
            [
                'tyrande',
                'Tyrande',
            ],
            [
                'uldaman',
                'Uldaman',
            ],
            [
                'ulduar',
                'Ulduar',
            ],
            [
                'uldum',
                'Uldum',
            ],
            [
                'ungoro',
                'Un\'Goro',
            ],
            [
                'varimathras',
                'Varimathras',
            ],
            [
                'vashj',
                'Vashj',
            ],
            [
                'veklor',
                'Vek\'lor',
            ],
            [
                'veknilash',
                'Vek\'nilash',
            ],
            [
                'voljin',
                'Vol\'jin',
            ],
            [
                'wildhammer',
                'Wildhammer',
            ],
            [
                'wrathbringer',
                'Wrathbringer',
            ],
            [
                'xavius',
                'Xavius',
            ],
            [
                'ysera',
                'Ysera',
            ],
            [
                'ysondre',
                'Ysondre',
            ],
            [
                'zenedar',
                'Zenedar',
            ],
            [
                'zirkel-des-cenarius',
                'Zirkel des Cenarius',
            ],
            [
                'zuljin',
                'Zul\'jin',
            ],
            [
                'zuluhed',
                'Zuluhed',
            ],
            [
                'akama',
                'Akama',
            ],
            [
                'altar-of-storms',
                'Altar of Storms',
            ],
            [
                'alterac-mountains',
                'Alterac Mountains',
            ],
            [
                'andorhal',
                'Andorhal',
            ],
            [
                'anvilmar',
                'Anvilmar',
            ],
            [
                'azgalor',
                'Azgalor',
            ],
            [
                'azralon',
                'Azralon',
            ],
            [
                'barthilas',
                'Barthilas',
            ],
            [
                'black-dragonflight',
                'Black Dragonflight',
            ],
            [
                'blackwater-raiders',
                'Blackwater Raiders',
            ],
            [
                'blackwing-lair',
                'Blackwing Lair',
            ],
            [
                'bleeding-hollow',
                'Bleeding Hollow',
            ],
            [
                'blood-furnace',
                'Blood Furnace',
            ],
            [
                'bonechewer',
                'Bonechewer',
            ],
            [
                'caelestrasz',
                'Caelestrasz',
            ],
            [
                'cairne',
                'Cairne',
            ],
            [
                'cenarion-circle',
                'Cenarion Circle',
            ],
            [
                'cenarius',
                'Cenarius',
            ],
            [
                'coilfang',
                'Coilfang',
            ],
            [
                'dark-iron',
                'Dark Iron',
            ],
            [
                'darrowmere',
                'Darrowmere',
            ],
            [
                'dathremar',
                'Dath\'Remar',
            ],
            [
                'dawnbringer',
                'Dawnbringer',
            ],
            [
                'demon-soul',
                'Demon Soul',
            ],
            [
                'detheroc',
                'Detheroc',
            ],
            [
                'draktharon',
                'Drak\'Tharon',
            ],
            [
                'draka',
                'Draka',
            ],
            [
                'drakkari',
                'Drakkari',
            ],
            [
                'dreadmaul',
                'Dreadmaul',
            ],
            [
                'drenden',
                'Drenden',
            ],
            [
                'duskwood',
                'Duskwood',
            ],
            [
                'echo-isles',
                'Echo Isles',
            ],
            [
                'farstriders',
                'Farstriders',
            ],
            [
                'feathermoon',
                'Feathermoon',
            ],
            [
                'fenris',
                'Fenris',
            ],
            [
                'firetree',
                'Firetree',
            ],
            [
                'fizzcrank',
                'Fizzcrank',
            ],
            [
                'gallywix',
                'Gallywix',
            ],
            [
                'garithos',
                'Garithos',
            ],
            [
                'gnomeregan',
                'Gnomeregan',
            ],
            [
                'gorefiend',
                'Gorefiend',
            ],
            [
                'grizzly-hills',
                'Grizzly Hills',
            ],
            [
                'gundrak',
                'Gundrak',
            ],
            [
                'gurubashi',
                'Gurubashi',
            ],
            [
                'hydraxis',
                'Hydraxis',
            ],
            [
                'icecrown',
                'Icecrown',
            ],
            [
                'jubeithos',
                'Jubei\'Thos',
            ],
            [
                'kalecgos',
                'Kalecgos',
            ],
            [
                'korgath',
                'Korgath',
            ],
            [
                'korialstrasz',
                'Korialstrasz',
            ],
            [
                'lethon',
                'Lethon',
            ],
            [
                'lightninghoof',
                'Lightninghoof',
            ],
            [
                'llane',
                'Llane',
            ],
            [
                'madoran',
                'Madoran',
            ],
            [
                'maelstrom',
                'Maelstrom',
            ],
            [
                'maiev',
                'Maiev',
            ],
            [
                'misha',
                'Misha',
            ],
            [
                'moknathal',
                'Mok\'Nathal',
            ],
            [
                'moon-guard',
                'Moon Guard',
            ],
            [
                'moonrunner',
                'Moonrunner',
            ],
            [
                'muradin',
                'Muradin',
            ],
            [
                'nazgrel',
                'Nazgrel',
            ],
            [
                'nesingwary',
                'Nesingwary',
            ],
            [
                'queldorei',
                'Quel\'dorei',
            ],
            [
                'rivendare',
                'Rivendare',
            ],
            [
                'scarlet-crusade',
                'Scarlet Crusade',
            ],
            [
                'scilla',
                'Scilla',
            ],
            [
                'sentinels',
                'Sentinels',
            ],
            [
                'shadow-council',
                'Shadow Council',
            ],
            [
                'shadowmoon',
                'Shadowmoon',
            ],
            [
                'shandris',
                'Shandris',
            ],
            [
                'shuhalo',
                'Shu\'halo',
            ],
            [
                'silver-hand',
                'Silver Hand',
            ],
            [
                'sisters-of-elune',
                'Sisters of Elune',
            ],
            [
                'skywall',
                'Skywall',
            ],
            [
                'smolderthorn',
                'Smolderthorn',
            ],
            [
                'spirestone',
                'Spirestone',
            ],
            [
                'staghelm',
                'Staghelm',
            ],
            [
                'stonemaul',
                'Stonemaul',
            ],
            [
                'suramar',
                'Suramar',
            ],
            [
                'tanaris',
                'Tanaris',
            ],
            [
                'thaurissan',
                'Thaurissan',
            ],
            [
                'the-forgotten-coast',
                'The Forgotten Coast',
            ],
            [
                'the-scryers',
                'The Scryers',
            ],
            [
                'the-underbog',
                'The Underbog',
            ],
            [
                'thorium-brotherhood',
                'Thorium Brotherhood',
            ],
            [
                'thunderlord',
                'Thunderlord',
            ],
            [
                'tol-barad',
                'Tol Barad',
            ],
            [
                'tortheldrin',
                'Tortheldrin',
            ],
            [
                'undermine',
                'Undermine',
            ],
            [
                'ursin',
                'Ursin',
            ],
            [
                'uther',
                'Uther',
            ],
            [
                'velen',
                'Velen',
            ],
            [
                'warsong',
                'Warsong',
            ],
            [
                'whisperwind',
                'Whisperwind',
            ],
            [
                'windrunner',
                'Windrunner',
            ],
            [
                'winterhoof',
                'Winterhoof',
            ],
            [
                'wyrmrest-accord',
                'Wyrmrest Accord',
            ],
            [
                'zangarmarsh',
                'Zangarmarsh',
            ],
            [
                '데스윙',
                '데스윙',
            ],
            [
                '듀로탄',
                '듀로탄',
            ],
            [
                '불타는-군단',
                '불타는 군단',
            ],
            [
                '세나리우스',
                '세나리우스',
            ],
            [
                '아즈샤라',
                '아즈샤라',
            ],
            [
                '윈드러너',
                '윈드러너',
            ],
            [
                '줄진',
                '줄진',
            ],
            [
                '하이잘',
                '하이잘',
            ],
            [
                '헬스크림',
                '헬스크림',
            ],
            [
                '世界之樹',
                '世界之樹',
            ],
            [
                '亞雷戈斯',
                '亞雷戈斯',
            ],
            [
                '冰霜之刺',
                '冰霜之刺',
            ],
            [
                '冰風崗哨',
                '冰風崗哨',
            ],
            [
                '地獄吼',
                '地獄吼',
            ],
            [
                '夜空之歌',
                '夜空之歌',
            ],
            [
                '天空之牆',
                '天空之牆',
            ],
            [
                '寒冰皇冠',
                '寒冰皇冠',
            ],
            [
                '尖石',
                '尖石',
            ],
            [
                '屠魔山谷',
                '屠魔山谷',
            ],
            [
                '巨龍之喉',
                '巨龍之喉',
            ],
            [
                '憤怒使者',
                '憤怒使者',
            ],
            [
                '日落沼澤',
                '日落沼澤',
            ],
            [
                '暗影之月',
                '暗影之月',
            ],
            [
                '水晶之刺',
                '水晶之刺',
            ],
            [
                '狂熱之刃',
                '狂熱之刃',
            ],
            [
                '眾星之子',
                '眾星之子',
            ],
            [
                '米奈希爾',
                '米奈希爾',
            ],
            [
                '聖光之願',
                '聖光之願',
            ],
            [
                '血之谷',
                '血之谷',
            ],
            [
                '語風',
                '語風',
            ],
            [
                '銀翼要塞',
                '銀翼要塞',
            ],
            [
                '阿薩斯',
                '阿薩斯',
            ],
            [
                '雲蛟衛',
                '雲蛟衛',
            ],
            [
                '雷鱗',
                '雷鱗',
            ],
        ];
    }

    /**
     * Tests that the class isn't instantiable.
     */
    public function testNotInstantiable(): void
    {
        $this->expectException(Error::class);
        $this->expectExceptionMessage('Call to private');

        new Utils();
    }

    /**
     * Tests that all known realm names are properly turned into slugs.
     *
     * @dataProvider realmProvider
     *
     * @param string $expected
     * @param string $name
     */
    public function testRealmNameToSlug(string $expected, string $name): void
    {
        $this->assertSame($expected, Utils::realmNameToSlug($name));
    }

    /**
     * Tests that a character's unique ID can properly be extracted.
     */
    public function testThumbnailToId(): void
    {
        $this->assertSame('207104578511', Utils::thumbnailToId('internal-record-3702/207/104578511-avatar.jpg'));
    }

    /**
     * Tests that an exception is raised on an invalid thumbnail URL.
     */
    public function testThumbnailToIdWithInvalidUrl(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Invalid thumbnail URL "invalid.jpg"');

        Utils::thumbnailToId('invalid.jpg');
    }
}
